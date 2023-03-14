<?php

require_once('C:\wamp64\www\g4arena\configbdd.php');

session_start();
// ajout fonction impossible si siege eloigne 
$id_event = $_GET['id_event'];

$placesId = $bdd->query("SELECT * FROM places WHERE id_event = " . $id_event);
$valeurs = $placesId->fetch();

if (isset($_SESSION['user'])) {

    $affich_users = $bdd->prepare('SELECT id FROM users WHERE id=?');
    $affich_users->execute(array($_SESSION['user']));
    $affichage = $affich_users->fetch();
}


if (isset($_POST['envoyer'])) {
    $places = $bdd->prepare('UPDATE places SET statut = "selected" WHERE id=:id');
    $places->execute(array(
        'id' => $_POST['envoyer'],
    ));

    header('Location:/ressources/views/siegeZone1.php?id_event=' . $valeurs['id_event'] . '');
}

if (isset($_POST['envoyerselected'])) {
    $places = $bdd->prepare('UPDATE places SET statut = "dispo" WHERE id=:id');
    $places->execute(array(
        'id' => $_POST['envoyerselected'],
    ));

    header('Location:/ressources/views/siegeZone1.php?id_event=' . $valeurs['id_event'] . '');
}

// if (isset($_POST['envoyerreserve'])) {
//     $places = $bdd->prepare('UPDATE places SET statut = "dispo", id_user= 1 WHERE id=:id');
//     $places->execute(array(
//         'id' => $_POST['envoyerreserve'],
//     ));

//     header('Location:/ressources/views/siegeZone1.php?id_event=' . $valeurs['id_event'] . '');
// }

if (isset($_POST['reservez'])) {
    $idUser = $_SESSION['user'];
    $places = $bdd->prepare('UPDATE places SET statut = "reserve", id_user=:idUser WHERE statut="selected" AND id_zone=1');
    $places->execute(array(
        'idUser' => $idUser
    ));

    header('Location:/ressources/views/commandeZone1.php?id_event=' . $valeurs['id_event'] . '');
    die();
}
