<!DOCTYPE html>
<html ng-app="MyApp" lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/siege.css">
    <script src="https://kit.fontawesome.com/07ade87dc2.js" crossorigin="anonymous"></script>
    <title>VIP</title>
    <?php
    session_start();
    //connection à la bdd
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    require_once('C:\wamp64\www\g4arena\configbdd.php');
    $places = $bdd->query('SELECT * From places');
    $info = $places->fetch();
    if (isset($_SESSION['user'])) {

        $affich_users = $bdd->prepare('SELECT id,name FROM users WHERE id=?');
        $affich_users->execute(array($_SESSION['user']));
        $affichage = $affich_users->fetch();
    }
    $mysqli = new mysqli("localhost", "root", "", "g4_arena");

    $requete = 'SELECT * FROM evenements';
    $resultat = $mysqli->query($requete);

    $totalselect = $bdd->query('SELECT COUNT(*) As totalselect From places Where statut="selected" and id_zone="6"');
    $totalselected = $totalselect->fetch();

    $id_event = $_GET['id_event'];

    $placesId = $bdd->prepare('SELECT * FROM places WHERE id_event = :idevent');
    $placesId->execute(array('idevent' => $id_event));
    $valeurs = $placesId->fetch();
    ?>
</head>

<body>
    <?php
    include './navbar.php';
    ?>
    <div class=titre>
        <H2>Bienvenue dans la zone VIP</H2>
        <p>Choisissez vos places :</p>
    </div>

    <?php if ($totalselected['totalselect'] >= 1) { ?>
        <div class="panier">
            <div class="picto">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div class="prixTotal">
                <?php
                $prix = 'SELECT SUM(prix) AS prix 
                    FROM zone 
                    INNER JOIN places 
                    ON zone.id = places.id_zone
                    WHERE id_zone = 6 AND statut = "selected"';
                $resPrix = $mysqli->query($prix);
                while ($prixselected = $resPrix->fetch_assoc()) {
                    echo $prixselected['prix'] . "€ ";
                }
                ?>
            </div>
        </div>
    <?php } ?>
    <?php
    if (empty($_SESSION['user'])) {
    ?>
        <div class="connexionRecquise">
            <img class="attention" src="/ressources/img/attention.png">
            <p class="cotxt">Vous devez être connecté pour sélectionner vos places</p>

            <a href="./login.php"><button class="co" type="submit" name="reservez">Se connecter</button></a>
        </div>
    <?php
    }
    ?>

    <div class="placeVIPtop">
        <table>
            <?php

            $mysqli->set_charset("utf8");
            $requete1a25 = 'SELECT * FROM places WHERE rang = "A" AND id_event = ' . $id_event . ' AND id_zone = 6';
            $resultat = $mysqli->query($requete1a25);

            while ($ligne = $resultat->fetch_assoc()) {

                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>

    <?php echo "<br>" ?>

    <div class="placeVIP">
        <?php
        $requete26a50 = 'SELECT * FROM places WHERE rang = "B" AND id_event = ' . $id_event . ' AND id_zone = 6';
        $resultat26a50 = $mysqli->query($requete26a50);
        ?>
        <table>
            <?php
            while ($ligne = $resultat26a50->fetch_assoc()) {
                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>

    <?php echo "<br>" ?>

    <div class="placeVIP">
        <?php
        $requete51a75 = 'SELECT * FROM places WHERE rang = "C" AND id_event = ' . $id_event . ' AND id_zone = 6';
        $resultat51a75 = $mysqli->query($requete51a75);
        ?>
        <table>
            <?php
            while ($ligne = $resultat51a75->fetch_assoc()) {
                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>


    <?php echo "<br>" ?>

    <div class="placeVIP">
        <?php
        $requete76a100 = 'SELECT * FROM places WHERE rang = "D" AND id_event = ' . $id_event . ' AND id_zone = 6';
        $resultat76a100 = $mysqli->query($requete76a100);
        ?>
        <table>
            <?php
            while ($ligne = $resultat76a100->fetch_assoc()) {
                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>


    <?php echo "<br>" ?>

    <div class="placeVIP">
        <?php
        $requete101a125 = 'SELECT * FROM places WHERE rang = "E" AND id_event = ' . $id_event . ' AND id_zone = 6';
        $resultat101a125 = $mysqli->query($requete101a125);
        ?>
        <table>
            <?php
            while ($ligne = $resultat101a125->fetch_assoc()) {
                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>


    <?php echo "<br>" ?>

    <div class="placeVIP">
        <?php
        $requete126a150 = 'SELECT * FROM places WHERE rang = "F" AND id_event = ' . $id_event . ' AND id_zone = 6';
        $resultat126a150 = $mysqli->query($requete126a150);
        ?>
        <table>
            <?php
            while ($ligne = $resultat126a150->fetch_assoc()) {
                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>

    <?php echo "<br>" ?>

    <div class="placeVIP">
        <?php
        $requete151a175 = 'SELECT * FROM places WHERE rang = "G" AND id_event = ' . $id_event . ' AND id_zone = 6';
        $resultat151a175 = $mysqli->query($requete151a175);
        ?>
        <table>
            <?php
            while ($ligne = $resultat151a175->fetch_assoc()) {
                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>

    <?php echo "<br>" ?>

    <div class="placeVIPBottom">
        <?php
        $requete176a200 = 'SELECT * FROM places WHERE rang = "H" AND id_event = ' . $id_event . ' AND id_zone = 6';
        $resultat176a200 = $mysqli->query($requete176a200);
        ?>
        <table>
            <?php
            while ($ligne = $resultat176a200->fetch_assoc()) {
                $statut = $ligne['statut'];
                $id = $ligne['id'];

                if ($statut == 'reserve') {
                    include './siegeReserve.php';
                }

                if ($statut == 'dispo') {
                    include './siegeDispo.php';
                }

                if ($statut == 'selected') {
                    include './siegeSelected.php';
                }
            }
            ?>
        </table>
    </div>

    <?php if ($totalselected['totalselect'] >= 1) { ?>
        <div class="formsieges">
            <form action="./siegeVIP_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">

                <div class="placesselected">
                    <?php
                    if ($totalselected['totalselect'] == 1) {
                        echo "Vous avez selectionnez la place :";
                    } else if ($totalselected['totalselect'] >= 2) {
                        echo "Vous avez selectionnez les places :";
                    } else {
                        echo "";
                    }
                    ?>
                    <div class="idselected">
                        <?php
                        $selected = 'SELECT * From places Where statut="selected" And id_zone = 6';
                        $resselected = $mysqli->query($selected);
                        while ($ligneselected = $resselected->fetch_assoc()) {
                            echo "N°" . $ligneselected['rang'] . $ligneselected['nplace'] . " ";
                        }
                        ?>
                    </div>

                </div>
                <button class="btnreserve" type="submit" name="reservez">
                    Reservez !
                </button>

            </form>
        </div>
    <?php } ?>

    <?php
    $mysqli->close();
    ?>
    <?php
    include './footer.php';
    ?>
</body>

</html>