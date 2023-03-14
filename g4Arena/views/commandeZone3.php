<!DOCTYPE html>
<html ng-app="MyApp" lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/commande.css">
    <script src="https://kit.fontawesome.com/07ade87dc2.js" crossorigin="anonymous"></script>
    <title>Commande</title>
    <?php
    session_start();
    //connection à la bdd
    require_once('C:\wamp64\www\g4arena\configbdd.php');
    $places = $bdd->query('SELECT * From places');
    $info = $places->fetch();
    if (isset($_SESSION['user'])) {

        $affich_users = $bdd->prepare('SELECT id, name FROM users WHERE id=?');
        $affich_users->execute(array($_SESSION['user']));
        $affichage = $affich_users->fetch();
    }
    $mysqli = new mysqli("localhost", "root", "", "g4_arena");
    ?>
    <?php
    $id_event = $_GET['id_event'];

    $totalselect = $bdd->query('SELECT COUNT(*) As totalselect From places Where statut="selected" and id_zone="3" AND id_event = ' . $id_event . '');
    $totalselected = $totalselect->fetch();
    ?>
</head>

<body>
    <?php
    include './navbar.php';
    ?>

    <div class="recap">
        <img src="/ressources/img/logo-sans-txt.png" width="100vw">
        <div class="confirmation">
            <i class="fa-regular fa-circle-check" class="check"></i>
            Votre commande est confirmée
        </div>
        Merci <?= $affichage['name'] ?> pour votre réservation !
        <div class="vosPlaces">
            <p>Vos places :</p>
            <?php
            $idUser = $_SESSION['user'];
            $selected = 'SELECT * From places Where statut="reserve" AND id_zone = 3 AND id_user=' . $idUser . ' AND id_event = ' . $id_event . '';
            $resselected = $mysqli->query($selected);
            while ($ligneselected = $resselected->fetch_assoc()) {
                echo "N°" . $ligneselected['rang'] . $ligneselected['nplace'] . " ";
            }
            ?>
        </div>
        <div class="total">
            <p>Total :</p>
            <?php
            $prix = 'SELECT SUM(prix) AS prix 
                    FROM zone 
                    INNER JOIN places 
                    ON zone.id = places.id_zone
                    WHERE id_zone = 3 AND statut = "reserve" AND id_user = ' . $idUser . ' AND id_event = ' . $id_event . '';
            $resPrix = $mysqli->query($prix);
            while ($prixselected = $resPrix->fetch_assoc()) {
                echo $prixselected['prix'] . "€ ";
            }
            ?>
        </div>
        <input class="formbutton" type="submit" name="envoyer" value="Retourner vers les évènements" onclick="window.location.href = 'http://g4arena/ressources/views/billeterie.php';">
    </div>

    <?php
    $mysqli->close();
    ?>
    <?php
    include './footer.php';
    ?>
</body>

</html>