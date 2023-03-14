<!DOCTYPE html>
<html ng-app="MyApp" lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/siegeFosse.css">
    <script src="https://kit.fontawesome.com/07ade87dc2.js" crossorigin="anonymous"></script>
    <title>siege</title>
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
        <H2>Bienvenue dans la zone Fosse</H2>
        <p>Choisissez le nombre de vos places :</p>
        <p class="info">*10 maximum par réservation</p>
    </div>
    <form action="./siegeFosse_controller.php?id_event=<?= $valeurs['id_event'] ?>" method="post">
        <div class="number">
            <input type="number" name="nbPlaces" min="0" max="10" value="0">
        </div>

        <div class="formsieges">
            <button class="btnreserve" type="submit" name="reservez">
                Reservez !
            </button>
        </div>
    </form>
    <?php if ($totalselected['totalselect'] >= 1) { ?>
        <div class="formsieges">
            <form action="./siegeVIP_controller.php" method="post">

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
                        $selected = 'SELECT * From places Where statut="selected"';
                        $resselected = $mysqli->query($selected);
                        while ($ligneselected = $resselected->fetch_assoc()) {
                            echo "N°" . $ligneselected['id'] . " ";
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