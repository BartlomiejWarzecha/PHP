<?php

namespace lib\model;
class Ship
{

    private $id;

    private $underRepair;
    private $name;
    private $weaponPower = 0;
    private $jediFactor = 0;
    private $strength = 0;
    private $age = 0;


    public function __construct($name = "")
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1, 300) < 30;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return strtoupper($this->name);
    }

    /**
     * @param mixed|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     */
    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    /**
     * @return int
     */
    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    /**
     * @param int $jediFactor
     */
    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }


    /**
     * @return boolean
     */
    public function getUnderRepair()
    {
        return $this->underRepair;
    }

    /**
     * @param boolean $underRepair
     */

    public function setUnderRepair($underRepair)
    {
        $this->underRepair = $underRepair;
    }

    public function giveSound()
    {

        return "Wuuu!";

    }

    public function isFunctional()
    {
        return !$this->underRepair;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s/%s/%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return $givenShip->strength > $this->strength;
    }

    function printShipSummary()
    {
        echo 'Ship.php Name: ' . $this->getName();
        echo '<hr/>';
        echo $this->giveSound();
        echo '<hr/>';
        echo $this->getNameAndSpecs(false);
        echo '<hr/>';
        echo $this->getNameAndSpecs(true);
    }
}