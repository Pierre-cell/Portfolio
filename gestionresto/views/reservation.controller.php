<?php
//connection à la bdd
require_once('C:\wamp64\www\gestionresto/configbdd.php'); 


$nomC = $_POST['nomC'];
$dateR = $_POST['dateR'];
$nbC = $_POST['nbC'];
$numTable = $_POST['numTable'];

$event_db = $bdd->prepare('INSERT INTO reserver(client, tableR, dateR, nbC)
                                   VALUES(:nomC, :numTable, :dateR, :nbC)');
$event_db->execute(array(
    'nomC' => $nomC,
    'dateR' => $dateR,
    'nbC' => $nbC,
    'numTable' => $numTable,
));


header('Location: reservation.php');
