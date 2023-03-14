<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); 

if (isset($_POST['edit'])) {
    $edit = $bdd->query('UPDATE editform SET id = 2 WHERE id = 1');
    header('Location:/views/stock.php');
}

if (isset($_POST['editdisabled'])) {
    $editDisable = $bdd->query('UPDATE editform SET id = 1 WHERE id = 2');
    header('Location:/views/stock.php');
}



if (isset($_POST['save'])) {

    $editName = $bdd->prepare('UPDATE ingredients SET stock = :qte  WHERE nom = :nom');
    $editName->execute(array(
        'qte' => $_POST['qte'],
        'nom' => $_POST['nom']
    ));
    header('Location:/views/stock.php');
}




if (isset($_POST['poubelle'])) {
    $nom = $_POST['nom'];
    $places = $bdd->prepare('UPDATE ingredients SET stock = "0" WHERE nom = :nom');
    $places->execute(array(
        'nom' => $nom
    ));
    header('Location:/views/stock.php');
}
