<?php
require_once('C:\wamp64\www\gestionresto/configbdd.php');



$nom = $_POST['nom'];
$dp = $_POST['dp'];
$prix = $_POST['prix'];
$categories = $_POST['categories'];


$event_db = $bdd->prepare('INSERT INTO plats (nom, dp, prix, categorie) VALUES (:nom, :dp, :prix, :categorie)');
$event_db->execute(array(
    'nom' => $nom,
    'dp' => $dp,
    'prix' => $prix,
    'categorie' => $categories
));


header('Location: carte3.php');
