<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
class UserManager
{
    private UserPasswordEncoderInterface $passwordEncoder;
    private EntityManagerInterface $entityManager;
    private RouterInterface $router;
    private MailerInterface $mailer;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager,
    RouterInterface $router, MailerInterface $mailer)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->mailer = $mailer;
    }

    public function register(User $user, string $plainPassword): void
    {

        $token = $this->createToken();
        $user->setConfirmationToken($token);

        $confirmationLink = $this->router->generate('check_confirmation_link', [
            'token' => $user->getConfirmationToken()
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, $plainPassword)
        );

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $confirmationEmail = (new TemplatedEmail())
            ->from('staff@example.com')
            ->to($user->getEmail())
            ->subject('Confirm your account')
            ->htmlTemplate('emails/registration_confirmation.html.twig')
            ->context([
                'confirmationLink' => $confirmationLink
            ]);
        $this->mailer->send($confirmationEmail);
    }

    private function createToken(): string
    {
        return rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
    }

}
