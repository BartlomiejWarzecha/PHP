<?php
namespace Model;


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
     * @return AbstractShip|null
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     * @return AbstractShip|null
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    /**
     * Was there a winner? Or did everybody die :(
     *
     * @return bool
     */
    public function isThereAWinner()
    {
        return $this->getWinningShip() !== null;
    }
    private $usedJediPowers;
    private $winningShip;
    private $losingShip;
    public function __construct($usedJediPowers, $winningShip = null, $losingShip = null)
    {
        $this->usedJediPowers = $usedJediPowers;
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
    }
}