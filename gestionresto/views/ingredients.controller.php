<?php require_once('C:\wamp64\www\gestionresto\configbdd.php');

$nom = $_POST['nom'];
$stock= $_POST['stock'];
$dateP = $_POST['dateP'];
$typeI = $_POST['typeI'];
$allergene = $_POST['allergene'];

$event_db = $bdd->prepare('INSERT INTO ingredients(nom, stock, dateP, TypeI, allergene)
                                   VALUES(:nom, :stock, :dateP, :TypeI, :allergene)');
$event_db->execute(array(
    'nom' => $nom,
    'stock' => $stock,
    'dateP' => $dateP,
    'TypeI' => $typeI,
    'allergene' => $allergene,
));


header('Location:/views/stock.php');