<?php


class ShipLoader
{
    public function getShips() : array
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

}