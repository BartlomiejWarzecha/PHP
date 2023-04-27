<?php


class RebelShip extends AbstractShip
{
    public function getFavoriteJedi()
    {
        $coolJedis = array('Yoda', 'Ben Kenobi', 'grogu');
        $key = array_rand($coolJedis);
        return $coolJedis[$key];
    }

    public function getType()
    {
        return 'rebel';
    }

    public function isFunctional()
    {
        return true;
    }
    public function getNameAndSpecs($useShortFormat = false)
    {
        $val = parent::getNameAndSpecs($useShortFormat);
        $val .= ' (Rebel)';
        return $val;
    }
    public function getJediFactor()
    {
        return rand(10,30);
    }

}