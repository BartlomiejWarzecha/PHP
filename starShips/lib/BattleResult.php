<?php

namespace lib;


class BattleResult
{
    /**
     * @return mixed
     */
    public function getUsedJediPowers()
    {
        return $this->usedJediPowers;
    }

    /**
     * @return mixed
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     * @return mixed
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    private $usedJediPowers;
    private $winningShip;
    private $losingShip;
    public function __construct($usedJediPowers, $winningShip, $losingShip)
    {
        $this->usedJediPowers = $usedJediPowers;
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
    }
}