<?php


class ShipLoader
{
    private $dbDsn;
    private $dbUser;
    private $dbPass;
    public function __construct($dbDsn, $dbUser, $dbPass ){

        $this->dbDsn = $dbDsn;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;

    }
    private $pdo;
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
        if ($this->pdo === null) {
            $this->pdo = new PDO(this->$dbDsn, this->$dbUser,this->$dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
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