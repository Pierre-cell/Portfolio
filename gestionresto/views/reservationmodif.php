<?php
//connection à la bdd
require_once('C:\wamp64\www\gestionresto/configbdd.php');

if (isset($_POST['edit'])) {
    $edit = $bdd->query('UPDATE editform SET id = 2 WHERE id = 1');
    header('Location:reservation.php');
}

if (isset($_POST['editdisabled'])) {
    $editDisable = $bdd->query('UPDATE editform SET id = 1 WHERE id = 2');
    header('Location:reservation.php');
}



if (isset($_POST['save'])) {

    $editName = $bdd->prepare('UPDATE reserver SET dateR = :dateR, nbC= :nbC  WHERE client = :clientnom');
    $editName->execute(array(
        'dateR' => $_POST['dateR'],
        'clientnom' => $_POST['clientnom'],
        'nbC' => $_POST['nbC']
    ));
    header('Location:reservation.php');
}
