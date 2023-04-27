<?php


$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=oo_battle',
    'db_user' => 'root',
    'db_pass' => null,
);

require_once __DIR__.'/lib/service/Container.php';
require_once __DIR__.'/lib/model/Ship.php';
require_once __DIR__.'/lib/model/RebelShip.php';
require_once __DIR__.'/lib/model/BattleResult.php';
require_once __DIR__.'/lib/service/BattleManager.php';
require_once __DIR__.'/lib/service/ShipLoader.php';

?>

