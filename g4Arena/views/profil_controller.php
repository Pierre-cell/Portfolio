<?php
require_once('C:\wamp64\www\g4arena\configbdd.php');

session_start();

if (isset($_POST['edit'])) {

    $edit = $bdd->query('UPDATE editform SET id = 2 WHERE id= 1');

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['editDisabled'])) {

    $editDisable = $bdd->query('UPDATE editform SET id = 1 WHERE id= 2');

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['save'])) {

    $editName = $bdd->prepare('UPDATE users SET name = :nameUser , email = :mailUser , telephone = :tel WHERE id=:id');
    $editName->execute(array('nameUser' => $_POST['nom'], 'id' => $_SESSION['user'], 'mailUser' => $_POST['mail'], 'tel' => $_POST['telephone']));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['poubelle'])) {

    $places = $bdd->prepare('UPDATE places SET statut = "dispo", id_user= 1 WHERE id=:id');
    $places->execute(array(
        'id' => $_POST['poubelle'],
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['ppf1'])) {

    $imgUrl = '\ressources\img\avatar-f-1.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['pph1'])) {

    $imgUrl = '\ressources\img\avatar-h-1.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['ppf2'])) {

    $imgUrl = '\ressources\img\avatar-f-2.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['pph2'])) {

    $imgUrl = '\ressources\img\avatar-h-2.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['ppf3'])) {

    $imgUrl = '\ressources\img\avatar-f-3.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl  WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['ppf4'])) {

    $imgUrl = '\ressources\img\avatar-f-4.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['pph3'])) {

    $imgUrl = '\ressources\img\avatar-h-3.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['ppf5'])) {

    $imgUrl = '\ressources\img\avatar-f-5.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}

if (isset($_POST['pph4'])) {

    $imgUrl = '\ressources\img\avatar-h-4.png';
    $places = $bdd->prepare('UPDATE users SET img_url = :imgUrl WHERE id=:id');
    $places->execute(array(
        'id' => $_SESSION['user'], 'imgUrl' => $imgUrl
    ));

    header('Location:/ressources/views/profil.php');
}
