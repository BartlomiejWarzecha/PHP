<?php

function getConnection(){
$config = require 'config.php';

$pdo = new PDO(
    $config['database_dsn'],
    $config['database_user'],
    $config['database_pass']
);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;



}
function getPetsJSON(){

$petsJson = file_get_contents('data/pets.json');
$pets = json_decode($petsJson, true);

return $pets;
}

function getPetsMYSQL($limit = null){

    $pdo = getConnection();

    if(isset($limit)){
        $query = $pdo->query('SELECT * FROM pet LIMIT :limitVal');
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('limitVal', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();
    }else{
        $result = $pdo->query('SELECT * FROM pet');
        $rows = $result->fetchAll();
    }

    return $rows;
}

function getPetMYSQL($id = null){
    $pdo = getConnection();
    $query = 'SELECT * FROM pet WHERE id = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
}
function savePetsJSON($pets){

    $json = json_encode($pets, JSON_PRETTY_PRINT);
    file_put_contents('data/pets.json', $json);

}


?>