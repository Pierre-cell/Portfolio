<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); 
$mail = $_POST['mail'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$naissance = $_POST['naissance'];
$genre = $_POST['genre'];
$telephone = $_POST['telephone'];
$ville = $_POST['ville'];

$event_db = $bdd->prepare('INSERT INTO clients(mail, nom, prenom, naissance, genre, telephone, ville)
VALUES(:mail, :nom, :prenom, :naissance, :genre, :telephone, :ville)');
$event_db->execute(array(
    'mail' => $mail,
    'nom' => $nom,
    'prenom' => $prenom,
    'naissance' => $naissance,
    'genre' => $genre,
    'telephone' => $telephone,
    'ville' => $ville,

));

header('Location:/views/clients.php');
