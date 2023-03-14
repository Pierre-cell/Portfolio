<!DOCTYPE html>
<html ng-app="MyApp" lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reservation.css">
    <script src="https://kit.fontawesome.com/07ade87dc2.js" crossorigin="anonymous"></script>
    <title>siege</title>
    <?php
    session_start();
    //connection à la bdd
    require_once('C:\wamp64\www\g4arena\configbdd.php');
    $places = $bdd->query('SELECT * From places');
    $info = $places->fetch();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

    $event_values = new mysqli("localhost", "root", "", "g4_arena");
    $event_values->set_charset("utf8");

    $requete = 'SELECT * FROM evenements WHERE id=id';
    $resultat = $event_values->query($requete);

    $id_event = $_GET['id'];

    $placesId = $bdd->query("SELECT * FROM places WHERE id_event = " . $id_event);
    $valeurs = $placesId->fetch();
    ?>
</head>

<body>
    <?php
    include './navbar.php';
    ?>

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
    <div class="vip">
        <a href="./siegeVIP.php?id_event=<?= $valeurs['id_event'] ?>">
            <div class="txtvip">

                <h2>ZONE VIP : PRIX 300€</h2>
                <p>
                    <?php
                    $dispovip = $bdd->query('SELECT COUNT(*) As totalvip From places Where statut="dispo" and id_zone="6" and id_event = ' . $id_event . '');
                    $totalvip = $dispovip->fetch();
                    echo "Places disponibles: " . $totalvip['totalvip'];
                    ?>
                </p>
            </div>
        </a>
    </div>
    <a href="/ressources/views/siegeZone1.php?id_event=<?= $valeurs['id_event'] ?>">
        <div class="zone1">
            <div class="txtzone1">
                <h2>ZONE 1 : PRIX 125€</h2>
                <?php
                $dispozone1 = $bdd->query('SELECT COUNT(*) As totalzone1 From places Where statut="dispo" and id_zone="1" and id_event = ' . $id_event . '');
                $totalzone1 = $dispozone1->fetch();
                echo "Places disponibles: " . $totalzone1['totalzone1'];
                ?>
            </div>
        </div>
    </a>

    <a href="/ressources/views/siegeZone2.php?id_event=<?= $valeurs['id_event'] ?>">
        <div class="zone2">
            <div class="txtzone2">
                <h2>ZONE 2 : PRIX 125€</h2>
                <?php
                $dispozone2 = $bdd->query('SELECT COUNT(*) As totalzone2 From places Where statut="dispo" and id_zone="2" and id_event = ' . $id_event . '');
                $totalzone2 = $dispozone2->fetch();
                echo "Places disponibles: " . $totalzone2['totalzone2'];
                ?>
            </div>
        </div>
    </a>

    <a href="/ressources/views/siegeZone3.php?id_event=<?= $valeurs['id_event'] ?>">
        <div class="zone3">
            <div class="txtzone3">
                <h2>Zone 3 : PRIX 150€</h2>
                <?php
                $dispozone3 = $bdd->query('SELECT COUNT(*) As totalzone3 From places Where statut="dispo" and id_zone="3" and id_event = ' . $id_event . '');
                $totalzone3 = $dispozone3->fetch();
                echo "Places disponibles: " . $totalzone3['totalzone3'];
                ?>
            </div>
        </div>
    </a>
    <a href="/ressources/views/siegeZone4.php?id_event=<?= $valeurs['id_event'] ?>">
        <div class="zone4">
            <div class="txtzone4">
                <h2>Zone 4 : PRIX 150€</h2>
                <?php
                $dispozone4 = $bdd->query('SELECT COUNT(*) As totalzone4 From places Where statut="dispo" and id_zone="4" and id_event = ' . $id_event . '');
                $totalzone4 = $dispozone4->fetch();
                echo "Places disponibles: " . $totalzone4['totalzone4'];
                ?>
            </div>
        </div>
    </a>
    <a href="/ressources/views/siegeFosse.php?id_event=<?= $valeurs['id_event'] ?>">
        <div class="fosse">

            <div class="txtfosse">
                <h2>Fosse : PRIX 45€</h2>
                <?php
                echo "Places disponibles: " . $totalfosse['totalfosse'];
                ?>
            </div>

        </div>
    </a>
    <img class="salle" src="/ressources/img/salle.png"></img>

    <?php
    include './footer.php';
    ?>
</body>

</html>