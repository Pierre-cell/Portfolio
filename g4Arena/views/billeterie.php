<?php

session_start();
//connection à la bdd
require_once('C:\wamp64\www\g4arena\configbdd.php');

$_SESSION['current_page'] = $_SERVER['REQUEST_URI']
?>

<head>
    <title>Billeterie</title>
    <link rel="stylesheet" href="/ressources/css/theme.css">
    <script src="/ressources/js/addform.js"></script>
    <meta charset="utf8">
</head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?php
include './navbar.php'
?>

<h1 style="text-align: center;">LISTE DES ÉVÈNEMENTS :</h1>
<?php

if (isset($_SESSION['user'])) {

    $infos_users = $bdd->prepare('SELECT role FROM users WHERE id=?');
    $infos_users->execute(array($_SESSION['user']));
    $info = $infos_users->fetch();

    $event_infos = $bdd->prepare('SELECT name, id FROM salle WHERE id=1 ');
    $event_infos->execute(array($_SESSION['user']));
    $event = $event_infos->fetch();

    $nom_star = $bdd->prepare('SELECT * FROM star WHERE id = id ');
    $nom_star->execute(array($_SESSION['user']));
    $stars = $nom_star->fetchAll();


    $role = $info['role'];

    if ($role == 1) {
?>
        <div class="butadd">
            <button class="material-symbols-outlined" id="button" onclick="Afficher();">add</button>
        </div>

        <form action="./billeterie_controller.php" method="post">
            <div class="popup">
                <div class="popup-content">
                    <img src="../img/close.svg" alt="Close" class="close" onclick="fermer();">
                    <h1>Ajoutez votre évènement</h1>
                    <div class="titrenom">
                        <label class="lab">Titre de l'évènement : </label>
                        <input type="text" placeholder="Titre" name="titreEvent" class="addinput">
                        <label class="coteD">Nom de la star : </label>
                        <select class="nomStar" name="nomStar"> Nom de la star
                            <?php
                            foreach ($stars as $star) {
                            ?>
                                <option value="<?= $star['name'] ?>"><?= $star['name'] ?></option>
                            <?php
                            }
                            ?>
                    </div>
                    <div class="titrenom">
                        <label class="lab">Date de début : </label>
                        <input type="date" placeholder="DateD" name="dateD" class="addinput">
                        <label class="coteD">Date fin : </label>
                        <input type="date" placeholder="DateF" name="dateF" class="addinput">
                    </div>
                    <div class="titrenom">
                        <label class="lab">heure de l'évènement : </label>
                        <input type="time" placeholder="heure" name="heureEvent" class="addinput">
                        <label class="coteD">Résumé de l'évènement : </label>
                        <input type="text" placeholder="Résumé" name="resumeEvent" class="addinput">
                    </div>
                    <div class="titrenom">
                        <label class="lab">Nom de la salle</label>
                        <select class="selectSalle" name="salle">
                            <option value="<?= $event['id'] ?>"><?= $event['name'] ?></option>
                        </select>
                        <label class="coteD">Infos de l'évènement : </label>
                        <textarea type="textarea" placeholder="Informations" name="InfosEvent" class="addinput"></textarea>
                    </div>
                    <div class="titrenom">
                        <label class="lab">Banniere event</label></br>
                        <input type="file" id="avatar" name="img"></br>
                        <label class="lab">Image de l'artiste</label></br>
                        <input type="file" id="avatar" name="imageA"></br>
                    </div>
                    <input type="submit" class="button" value="Ajouter"></input>
                </div>
            </div>
        </form>


    <?php
    }
}
$event_values = new mysqli("localhost", "root", "", "g4_arena");
$event_values->set_charset("utf8");
$requete = 'SELECT * FROM evenements WHERE id=id';
$resultat = $event_values->query($requete);

foreach ($resultat as $row) {

    ?>
    <div class="place">
        <img src="<?= $row['img_url'] ?>" class="imgPlace">
        <span class="titrePlace"><?= $row['star_name'], $row['title'] ?></span>
        <p class="textPlace"><?= $row['resume'] ?></p>
        <a href="./infoEvenement.php?id=<?= $row['id'] ?>" class="areservation">
            <button class="reservation">
                En savoir plus
            </button>
        </a>
    </div>




<?php
}
include './footer.php'
?>