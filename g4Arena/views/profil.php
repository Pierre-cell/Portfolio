<!DOCTYPE html>
<html ng-app="MyApp" lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profil.css">
    <script src="https://kit.fontawesome.com/07ade87dc2.js" crossorigin="anonymous"></script>
    <title>Profil</title>
    <?php
    session_start();
    //connection à la bdd
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    require_once('C:\wamp64\www\g4arena\configbdd.php');
    $places = $bdd->query('SELECT * From places');
    $info = $places->fetch();
    if (isset($_SESSION['user'])) {

        $affich_users = $bdd->prepare('SELECT * FROM users WHERE id=?');
        $affich_users->execute(array($_SESSION['user']));
        $affichage = $affich_users->fetch();
    }
    $mysqli = new mysqli("localhost", "root", "", "g4_arena");
    $totalselect = $bdd->query('SELECT COUNT(*) As totalselect From places Where statut="selected" and id_zone="6"');
    $totalselected = $totalselect->fetch();

    $editForm = $bdd->query('SELECT * From editform Where id = 1 or id = 2');
    $editFormFetch = $editForm->fetch();
    $editValue = $editFormFetch['id'];

    ?>
    <script src="/ressources/js/addform.js"></script>

</head>

<body>
    <?php
    include './navbar.php';
    ?>
    <?php
    if (empty($_SESSION['user'])) {
    ?>
        <div class="connexionRecquise">
            <img class="attention" src="/ressources/img/attention.png">
            <p class="cotxt">Vous devez être connecté pour acceder à votre profil</p>

            <a href="./login.php"><button class="co" type="submit" name="reservez">Se connecter</button></a>
        </div>
    <?php
    } else {
    ?>
        <div class="profilTop">
            <button class="ppButton" id="button" onclick="Afficher();">
                <img src="\ressources\img\image-solid.svg" id="txtPp" />
                <img class="profilPicUser" src="<?= $affichage['img_url'] ?>" style="width:120px; height:120px; border-radius:30px;">
            </button>
        </div>

        <div class="popup">
            <div class="popup-content">
                <img src="../img/close.svg" alt="Close" class="close" onclick="fermer();">
                <form action="./profil_controller.php" method="post">
                    <div class="top">
                        <button class="btnsiegeCo" type="submit" name="ppf1">
                            <img class="profilPic" src="\ressources\img\avatar-f-1.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                        <button class="btnsiegeCo" type="submit" name="pph1">
                            <img class="profilPic" src="\ressources\img\avatar-h-1.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                        <button class="btnsiegeCo" type="submit" name="ppf2">
                            <img class="profilPic" src="\ressources\img\avatar-f-2.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                    </div>
                    <div class="mid">
                        <button class="btnsiegeCo" type="submit" name="pph2">
                            <img class="profilPic" src="\ressources\img\avatar-h-2.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                        <button class="btnsiegeCo" type="submit" name="ppf3">
                            <img class="profilPic" src="\ressources\img\avatar-f-3.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                        <button class="btnsiegeCo" type="submit" name="ppf4">
                            <img class="profilPic" src="\ressources\img\avatar-f-4.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                    </div>
                    <div class="bottom">
                        <button class="btnsiegeCo" type="submit" name="pph3">
                            <img class="profilPic" src="\ressources\img\avatar-h-3.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                        <button class="btnsiegeCo" type="submit" name="ppf5">
                            <img class="profilPic" src="\ressources\img\avatar-f-5.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                        <button class="btnsiegeCo" type="submit" name="pph4">
                            <img class="profilPic" src="\ressources\img\avatar-h-4.png" style="width:80px; height:80px; border-radius:50px;">
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class=titre>
            <H2>Bonjour <?= $affichage['name'] ?></H2>
        </div>

        <div class="profil">
            <?php if ($editValue == 2) { ?>
                <div class="infos">
                    <form class="formulaire" action="./profil_controller.php" method="post">
                        <p>Vos informations</p>
                        <div class="txt_fieldform">
                            <button class="fa-solid fa-pencil" id="crayon" name="editDisabled"></button>
                            <input type="text" name="nom" value="<?= $affichage['name'] ?>" />
                            <span></span>
                            <label>Nom</label>
                            </br>
                        </div>
                        <div class="txt_fieldform">
                            <input type="text" name="mail" value="<?= $affichage['email'] ?>" />
                            <span></span>
                            <label>E-mail</label>
                            </br>
                        </div>
                        <div class="txt_fieldform">
                            <input type="text" name="telephone" value="<?= $affichage['telephone'] ?>" />
                            <span></span>
                            <label>Numéro de téléphone</label>
                            </br>
                        </div>
                        <div class="txt_fieldform">
                            <input type="password" name="mdp" id="pass" value="<?= $affichage['password'] ?>" />
                            <span></span>
                            <i class="fa-solid fa-eye" id="eye" onclick="changer()"> </i>
                            <label>Mot de passe</label>
                        </div>
                        </br>
                        <input class="save" type='submit' value='Sauvegarder' name='save' />
                    </form>
                </div>
                <script>
                    e = true;

                    function changer() {
                        if (e) {
                            document.getElementById("pass").setAttribute("type", "text");
                            e = false;
                        } else {
                            document.getElementById("pass").setAttribute("type", "password");
                            e = true;
                        }
                    }
                </script>
            <?php }

            if ($editValue == 1) { ?>
                <div class="infos">
                    <form class="formulaire" action="./profil_controller.php" method="post">
                        <p>Vos informations</p>
                        <div class="txt_fieldform">
                            <button class="fa-solid fa-pencil" id="crayon" name="edit"></button>
                            <input type="text" name="nom" value="<?= $affichage['name'] ?>" disabled />
                            <label>Nom</label>
                            </br>
                        </div>
                        <div class="txt_fieldform">
                            <input type="email" name="mail" value="<?= $affichage['email'] ?>" disabled />
                            <span></span>
                            <label>E-mail</label>
                            </br>
                        </div>
                        <div class="txt_fieldform">
                            <input type="text" name="telephone" value="<?= $affichage['telephone'] ?>" disabled />
                            <span></span>
                            <label>Numéro de téléphone</label>
                            </br>
                        </div>
                        <div class="txt_fieldform">
                            <input type="password" name="mdp" value="<?= $affichage['password'] ?>" disabled />
                            <span></span>
                            <label>Mot de passe</label>
                        </div>
                        </br>
                        <input class="saveDisabled" type='submit' value='Sauvegarder' name='save' disabled />
                    </form>
                </div>

            <?php } ?>



            <div class="places">
                <p>Vos réservations</p>
                <?php
                $idUser = $_SESSION['user'];
                $selected = 'SELECT * From places Where statut="reserve" AND id_user=' . $idUser . '';
                $resselected = $mysqli->query($selected);

                $totalreserve = $bdd->prepare('SELECT COUNT(*) As totalreserve From places Where statut="reserve" and id_user=:iduser');
                $totalreserve->execute(array('iduser' => $affichage['id']));
                $totalreserved = $totalreserve->fetch();
                if ($totalreserved['totalreserve'] < 1) {
                ?> <img src="..\img\oh-oh.svg" class="ohoh">
                    <p> Il n'y a rien a voir par ici...</p>
                <?php
                } ?>
                <div class="reserve">
                    <?php
                    while ($ligneselected = $resselected->fetch_assoc()) {
                        echo " N°" . $ligneselected['rang'] . $ligneselected['nplace'] . "| Zone " . $ligneselected['id_zone'] . "";
                    ?>

                        <form class="formulaire" action="./profil_controller.php" method="post">
                            <button class="fa-solid fa-trash" name="poubelle" id="poubelle" value=<?= $ligneselected['id'] ?>></button>
                        </form>

                    <?php
                    }
                    ?>
                </div>
            </div>
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