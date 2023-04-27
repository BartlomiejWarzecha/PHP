<?php

class Ship extends AbstractShip
{
    private $underRepair;

    public function __construct($name)
    {
        parent::__construct($name);

        $this->underRepair = mt_rand(1, 100) < 30;
    }
    public function getType()
    {
        return 'Empire';
    }
    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }
    public function getJediFactor()
    {
        return $this->jediFactor;
    }
    public function isFunctional()
    {
        return !$this->underRepair;
    }
}