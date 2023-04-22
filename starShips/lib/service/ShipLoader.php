<?php


namespace lib\service;
use lib\model\Ship;

class ShipLoader
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Ship[]
     */
    public function getShips(): array
    {
        $ships = array();
        $shipsData = $this->queryForShips();

        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }
        return $ships;
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }

    private function queryForShips()
    {
        $statement = $this->getPDO()->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $shipsArray;
    }

    /**
     * @param $id
     * @return Ship
     */
    public function findOneById($id)
    {
        $statement = this->getPD()->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$shipArray) {
            return null;
        }

        return $this->createShipFromData($shipArray);
    }

    private function createShipFromData(array $shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);
        return $ship;
    }
}