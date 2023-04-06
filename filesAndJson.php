<?php
$petsJson = file_get_contents('pets.json');

$pets = json_decode($petsJson);
//var_dump($pets);
$pupCount = count($pets);
echo $pupCount.PHP_EOL;
$pets = array_reverse($pets);
//var_dump($pets);die;
$pupCountReverse = count($pets);
echo $pupCountReverse;

$pets[] = ["name" => "Chew Barka 2",
    "breed"=> "Bichon 2",
    "age"=> "4 years",
    "weight"=> 10,
    "bio"=>"The park, The pool or the Playground - I love to go anywhere! I am really great at... SQUIRREL!",
    "filename"=> "pet5.png"];

$petsJson = json_encode($pets);

$addPetsJson = file_put_contents('petsTwo.json', $petsJson);

?>

