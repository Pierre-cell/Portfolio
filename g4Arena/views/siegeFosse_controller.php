<?php

require_once('C:\wamp64\www\g4arena\configbdd.php');

session_start();

$id_event = $_GET['id_event'];

$placesId = $bdd->query("SELECT * FROM places WHERE id_event = " . $id_event);
$valeurs = $placesId->fetch();

if (isset($_SESSION['user'])) {

    $affich_users = $bdd->prepare('SELECT id FROM users WHERE id=?');
    $affich_users->execute(array($_SESSION['user']));
    $affichage = $affich_users->fetch();
}

if (isset($_POST['reservez'])) {
    $idUser = $_SESSION['user'];
    $nbPlaces = $_POST['nbPlaces'];
    $places = $bdd->prepare('UPDATE places SET statut = "reserve", id_user=:idUser WHERE statut="dispo" AND id_zone = 5 AND id_event = :idevent ORDER BY id ASC LIMIT :nbPlaces');
    $places->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $places->bindValue(':nbPlaces', $nbPlaces, PDO::PARAM_INT);
    $places->bindValue(':idevent', $id_event, PDO::PARAM_INT);
    $places->execute();

    header('Location:/ressources/views/commandeFosse.php?id_event=' . $valeurs['id_event'] . '');
    die();
}
