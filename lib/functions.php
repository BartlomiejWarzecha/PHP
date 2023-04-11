<?php

function getPets(){

$petsJson = file_get_contents('data/pets.json');
$pets = json_decode($petsJson, true);

return $pets;
}
function savePets($pets){

    $json = json_encode($pets, JSON_PRETTY_PRINT);
    file_put_contents('data/pets.json', $json);

}
?>