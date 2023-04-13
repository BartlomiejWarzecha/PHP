<?php
require __DIR__.'/lib/Ship.php';
use lib\Ship;

function getShips() : array
{
    $ships = [];

    $ship1 = new Ship('Jedi Starfighter');
    // $ship1->setName('Jedi Starfighter');
    $ship1->setWeaponPower(5);
    $ship1->setJediFactor(15);
    $ship1->setStrength(30);
    $ships['starfighter'] = $ship1;

    $ship2 = new Ship('Millennium Falcon');
    // $ship2->setName('Millennium Falcon');
    $ship2->setWeaponPower(10);
    $ship2->setJediFactor(5);
    $ship2->setStrength(50);
    $ships['falcon'] = $ship2;

    $ship3 = new Ship('Imperial Star Destroyer');
    //$ship3->setName('Imperial Star Destroyer');
    $ship3->setWeaponPower(20);
    $ship3->setJediFactor(2);
    $ship3->setStrength(100);
    $ships['destroyer'] = $ship3;

    $ship4 = new Ship('X-wing Starfighter');
    //$ship4->setName('X-wing Starfighter');
    $ship4->setWeaponPower(8);
    $ship4->setJediFactor(10);
    $ship4->setStrength(40);
    $ships['xwing'] = $ship4;

    return $ships;
}
/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function battle(Ship $ship1, $ship1Quantity, Ship $ship2, $ship2Quantity)
{
    $ship1Health = $ship1->getStrength() * $ship1Quantity;
    $ship2Health = $ship2->getStrength() * $ship2Quantity;

    $ship1UsedJediPowers = false;
    $ship2UsedJediPowers = false;
    while ($ship1Health > 0 && $ship2Health > 0) {
        // first, see if we have a rare Jedi hero event!
        if (didJediDestroyShipUsingTheForce($ship1)) {
            $ship2Health = 0;
            $ship1UsedJediPowers = true;

            break;
        }
        if (didJediDestroyShipUsingTheForce($ship2)) {
            $ship1Health = 0;
            $ship2UsedJediPowers = true;

            break;
        }

        // now battle them normally
        $ship1Health = $ship1Health - ($ship2->getWeaponPower()* $ship2Quantity);
        $ship2Health = $ship2Health - ($ship1->getWeaponPower() * $ship1Quantity);
    }

    if ($ship1Health <= 0 && $ship2Health <= 0) {
        // they destroyed each other
        $winningShip = null;
        $losingShip = null;
        $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
    } elseif ($ship1Health <= 0) {
        $winningShip = $ship2;
        $losingShip = $ship1;
        $usedJediPowers = $ship2UsedJediPowers;
    } else {
        $winningShip = $ship1;
        $losingShip = $ship2;
        $usedJediPowers = $ship1UsedJediPowers;
    }

    return array(
        'winning_ship' => $winningShip,
        'losing_ship' => $losingShip,
        'used_jedi_powers' => $usedJediPowers,
    );
}

function didJediDestroyShipUsingTheForce(Ship $ship)
{
    $jediHeroProbability = $ship->getJediFactor() / 100;

    return mt_rand(1, 100) <= ($jediHeroProbability*105);
}
