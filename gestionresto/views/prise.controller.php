<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); 

if (isset($_POST['edit'])) {
    $edit = $bdd->query('UPDATE editform SET id = 2 WHERE id = 1');
    header('Location:../views/prise.php');
}

if (isset($_POST['editdisabled'])) {
    $editDisable = $bdd->query('UPDATE editform SET id = 1 WHERE id = 2');
    header('Location:../views/prise.php');
}



if (isset($_POST['save'])) {

    $editName = $bdd->prepare('UPDATE commander SET qte = :qte  WHERE client = :client');
    $editName->execute(array(
        'qte' => $_POST['qte'],
        'client' => $_POST['client']
    ));
    header('Location:../views/prise.php');
}




if (isset($_POST['poubelle'])) {
    $places = $bdd->prepare('DELETE FROM commander WHERE `commander`.`client` = :client AND `commander`.`tableC` = :TableC AND `commander`.`plat` = :Plats');
    $places->execute(array(
        'client' => $_POST['client'],
        'TableC' => $_POST['tableC'],
        'Plats' => $_POST['plat']
    ));
    header('Location:../views/prise.php');
}

?>