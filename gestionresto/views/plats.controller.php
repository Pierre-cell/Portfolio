<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); 


$id = $_GET['id'];

if (isset($_POST['plat'])) {
    $platC = $_POST['plat'];
    $qteC = $_POST['qte'];

    $queryEvent = $bdd->query('SELECT client FROM reserver WHERE tableR = ' . $id . '');
    $valeursEvent = $queryEvent->fetch();

    $placesVip = $bdd->prepare('INSERT INTO commander (client, tableC, dateC, plat, qte) VALUES (:client, :id, CURRENT_DATE,:plat , :qte)');
    $placesVip->execute(array(
        'id' => $id,
        'client' => $valeursEvent['client'],
        'plat' => $platC,
        'qte' => $qteC
    ));
    header('Location:/views/plats.php?id=' . $id . '');
    exit();
}
