<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/commande.css">
    <script src="../js/boutonscommandes.js"></script>
    <title>Prendre une commande</title>
</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="wrapper">
        <?php
        include 'navbar.php'
        ?>


        <div class="contenu">

            <br>
            <h1>PRENDRE UNE COMMANDE</h1>

            <br>

            <div class="center">
                <br>
                <div class="ygalreserver"><br>TABLE RÉSERVER - La commande n'a pas encore été prise.<br><br></div>
                <br>
                <div class="ygallibre"><br>TABLE LIBRE - La table est prête à prendre une nouvelle réservation.<br><br></div>
            </div>

            <br><br>

            <?php
            $query = $bdd->query('SELECT tables.num FROM tables LEFT JOIN reserver ON tables.num = reserver.tableR WHERE reserver.tableR IS NULL');

            $resultat = $query->fetchAll();
            $tabler = $bdd->query('SELECT tables.num FROM tables LEFT JOIN reserver ON tables.num = reserver.tableR WHERE reserver.tableR IS NOT NULL');

            $tablesr = $tabler->fetchAll();

            foreach ($resultat as $row) {

            ?>

                <div class="libre">
                    <a href="reservation.php"><button class="bouton1 reservation1">Table <?= $row['num'] ?></button></a>
                </div>
            <?php }
            foreach ($tablesr as $t) {

            ?>
                <div class="butadd">
                    <a href="plats.php?id=<?= $t['num'] ?>"> <button class="bouton2 reservation2">Table <?= $t['num'] ?></button></a>
                </div>


            <?php } ?>

        </div>
    </div>

</body>

</html>