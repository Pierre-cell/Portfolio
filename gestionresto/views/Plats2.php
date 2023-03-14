<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/plats.css">
    <title>Plats</title>
</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <?php
    include 'navbar.php';
    ?>

    <div class="wrapper">
        <div class="contenu">

            <br>        
            <h2>Faites votre choix :</h2>
            <br>   
            <div class="bouton-categorie">
                <a href="plats.php?id=<?= $_GET['id'] ?>"><button class="bitton">Entrées</button></a>
                <a href="plats2.php?id=<?= $_GET['id'] ?>"><button class="bitton">Plats</button></a>
                <a href="plats3.php?id=<?= $_GET['id'] ?>"><button class="bitton">Boissons</button></a>
                <a href="plats4.php?id=<?= $_GET['id'] ?>"><button class="bitton">Desserts</button></a><br>
            </div> 


            <div class="tableau">
    <table>
        <br>
        <thead>
            <tr>
                <th>Nom du plat</th>
                <th>Description du produit</th>
                <th>Prix</th>
                <th>Quantité</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $id_event = $_GET['id'];
        $query = $bdd->query("SELECT num FROM tables WHERE num = " . $id_event);
        $query = $query->fetchAll();

        $plats = $bdd->query('SELECT * FROM plats where categorie="Plats"');
        $plats = $plats->fetchAll();
        foreach ($plats as $p) {
        ?>
            <tr>
                <td>
                    <form action="./plats.controller.php?id=<?= $_GET['id'] ?>" method="post">
                        <input type="hidden" name="tableR" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="plat" value="<?= $p['nom'] ?>">
                        <label><?= $p['nom'] ?></label>
                </td>
                <td><?= $p['dp'] ?></td>
                <td><?= $p['prix'] ?></td>
                <td>
                    <input type="number" name="qte" class="addinput" min="0" placeholder="0">
                    <button type="submit">Ajouter</button>
                    </form>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
