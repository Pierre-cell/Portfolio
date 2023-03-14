<?php

session_start();
//connection à la bdd
require_once('C:\wamp64\www\g4arena\configbdd.php');
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
$id_event = $_GET['id'];
$connect = new mysqli("localhost", "root", "", "g4_arena");
$connect->set_charset("utf8");
$query = "SELECT * FROM evenements WHERE id = " . $id_event;
$valeurs = $connect->query($query);

$dispoPlaces = $bdd->query('SELECT COUNT(*) As totalPlaces From places Where id_event = ' . $id_event . '');
$totalPlaces = $dispoPlaces->fetch();
$countTotalPlaces = $totalPlaces['totalPlaces'];
?>

<head>
    <title>Infos évènement</title>
    <link rel="stylesheet" href="/ressources/css/theme.css">
    <script src="/ressources/js/addform.js"></script>
    <meta charset="utf8">
</head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?php
include './navbar.php'
?>

<section class="fullwidth">
    <?php
    foreach ($valeurs as $event) {
    ?>
        <section class="eventLeft">
            <h1 class="templateTitle" style="margin-top: 0px;"><?= $event['star_name'] ?> - <?= $event['title'] ?></h1>
            <img class="eventPhoto" src="<?= $event['img_url'] ?>">
            <h1 class="templateTitle"><?= $event['date_d'] ?></h1>
            <p class="eventDesc"><?= $event['infos'] ?></p>
            <a class="aRes" href="./reservation.php?id=<?= $event['id'] ?>">
                <button class="btnRes">RESERVER</button></a>
            <div class="gestionPlaces">
                <?php
                if (isset($_SESSION['user'])) {

                    $infos_users = $bdd->prepare('SELECT role FROM users WHERE id=?');
                    $infos_users->execute(array($_SESSION['user']));
                    $info = $infos_users->fetch();
                    $role = $info['role'];
                    if ($role == 1) {
                        if ($countTotalPlaces == 2500) {
                ?>
                            <img src="\ressources\img\felicitation.svg" class="felicitation" />
                            <p class="felicitationtxt"> Félicitation toutes les places sont créées !</p>
                            <div class="total">
                                <p>Disponibles:&nbsp</p>
                                <img src="/ressources/img/siegedispo.svg"></img>
                                <?php
                                $total = $bdd->query('SELECT COUNT(*) As totalseat From places Where statut="dispo" and id_zone!="5" and id_event = ' . $id_event . '');
                                $totalseat = $total->fetch();
                                echo $totalseat['totalseat'];
                                ?>
                                <img src="/ressources/img/personne.svg"></img>
                                <?php
                                $totalf = $bdd->query('SELECT COUNT(*) As totalfosse From places Where statut="dispo" and id_zone="5" and id_event = ' . $id_event . '');
                                $totalfosse = $totalf->fetch();
                                echo $totalfosse['totalfosse'];
                                ?>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="boutonsGestion">
                                <div class="creerPlace">
                                    <form action="places_controller.php?id_event=<?= $event['id'] ?>" method="post">
                                        <input type="submit" name="placeCreation" value="Créer les places">
                                    </form>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </section>
    <?php
    }
    ?>
    <section class="eventRight">
        <h1 class="templateTitle">Autres évènements</h1>
        <?php
        $event_values = new mysqli("localhost", "root", "", "g4_arena");
        $event_values->set_charset("utf8");
        $requete = 'SELECT * FROM evenements WHERE id=id';
        $resultat = $event_values->query($requete);

        foreach ($resultat as $row) {

        ?>
            <a href="./infoEvenement.php?id=<?= $row['id'] ?>">
                <img src="<?= $row['img_url'] ?>" class="eventImg" style="margin-top:30px;">
            </a>
        <?php
        }
        ?>
    </section>
</section>
<?php

include './footer.php'
?>