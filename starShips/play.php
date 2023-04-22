<?php
require __DIR__.'/lib/Ship.php';

use lib as starWars;
use lib\model\Ship;

/**
 * @param Ship $someShip
 */

$myShip = new starWars\Ship();
$myShip->setAge(11);
$myShip->setName('TIE Fighter');
$myShip->setWeaponPower(10);
$myShip->setJediFactor(10);
$myShip->setStrength(10);

$myNewShip = new starWars\Ship();
$myNewShip->setName("New ship");
$myNewShip->setWeaponPower(10);
$myNewShip->setJediFactor(15);
$myNewShip->setStrength(1);

/* echo "Name of my ship is not original: ".$myShip->name."year count: ".$myShip->age.PHP_EOL;
echo '<hr/>';
var_dump($myShip->weaponPower);
echo '<hr/>';
echo "Name of my new ship is not original: ".$myNewShip->name."but new, year count: ".$myNewShip->age.PHP_EOL;
$newShipSound = $myNewShip->giveSound();
echo "It gives cool sounds, like:".$newShipSound; */


echo $myNewShip->printShipSummary();
echo '<hr/>';
echo $myNewShip->printShipSummary();
echo '<hr/>';

if ($myShip->doesGivenShipHaveMoreStrength($myNewShip))
{
    echo $myNewShip->getName().' has more strength';
} else
{
    echo $myShip->getName().' has more strength';
}

?>