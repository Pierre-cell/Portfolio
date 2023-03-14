<?php
//connection à la bdd
require_once('C:\wamp64\www\g4arena\configbdd.php');

$titre = $_POST['titreEvent'];
$nom = $_POST['nomStar'];
$dateD = $_POST['dateD'];
$dateF = $_POST['dateF'];
$heure = $_POST['heureEvent'];
$resume = $_POST['resumeEvent'];
$salle = $_POST['salle'];
$infos = $_POST['InfosEvent'];

if (isset($_FILES)) {
    $imageAcc = $_POST['imageA'];
    $image = $_POST['img'];
    $extension_file = strrchr($image, ".");
    $extension_fille = strrchr($imageAcc, ".");
    $img_tmp_name = $_POST['img'];
    $img_tmp_nem = $_POST['imageA'];
    $autorized_extensions = array('.jpeg', '.gif', '.png', '.jpg');
    $dossier_imageA = '/ressources/img/' . $imageAcc;
    $dossier_img = '/ressources/img/' . $image;
    if (in_array($extension_file, $autorized_extensions)) {
        if (move_uploaded_file($img_tmp_name, $dossier_img));
        if (in_array($extension_fille, $autorized_extensions)) {
            if (move_uploaded_file($img_tmp_nem, $dossier_imageA));


            $event_db = $bdd->prepare('INSERT INTO evenements(title, star_name, date_d, date_f, heure, infos, resume, id_salle, img_name, img_url, img_acc)
                                   VALUES(:titreE, :name, :dateD, :dateF, :heure, :infos, :resume, :salle, :img_name, :img_url, :img_acc)');
            $event_db->execute(array(
                'titreE' => $titre,
                'name' => $nom,
                'dateD' => $dateD,
                'dateF' => $dateF,
                'heure' => $heure,
                'infos' => $infos,
                'resume' => $resume,
                'salle' => $salle,
                'img_acc' => $dossier_imageA,
                'img_name' => $image,
                'img_url' => $dossier_img
            ));
            header('Location:/ressources/views/billeterie.php');
        }
    }
}
