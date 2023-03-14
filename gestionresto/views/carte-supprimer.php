<?php
require_once('C:\wamp64\www\gestionresto/configbdd.php');

if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $places = $bdd->prepare('DELETE FROM `plats` WHERE `plats`.`nom` = :nom');
    $places->execute(array(
        'nom' => $nom
    ));
    header('Location: carte.php');
}
