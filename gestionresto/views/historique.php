<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/historique.css">
    <title>Historique</title>
</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="wrapper">

        <?php
        include 'navbar.php'
        ?>

        <div class="contenu">


            <div id="botn">
                <a class="salle bouton" href="tabler.php"> TABLES RÉSERVÉES </a>
                <a class="salle bouton" href="prise.php"> COMMANDES EN COURS </a>
                <a class="salle bouton" href="historique.php"> HISTORIQUES </a>
            </div>

            <h1>L'HISTORIQUE DES COMMANDES</h1>

            <div class="tableau">
                <table>
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Numéro de table</th>
                            <th>Date et heure</th>
                            <th>Nombre de couverts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $bdd->query('SELECT reserver.tableR, clients.nom as clientnom, reserver.dateR, reserver.nbC, clients.prenom as clientpre FROM reserver LEFT JOIN clients ON reserver.client=clients.mail WHERE reserver.dateR < "2023-03-17 00:00:00" ORDER BY reserver.dateR;');
                        $resultat = $query->fetchAll();
                        foreach ($resultat as $row) {
                        ?>
                            <tr>
                                <td><?= $row['clientnom'] . ' ' . $row['clientpre'] ?></td>
                                <td id="td1"><?= $row['tableR'] ?></td>
                                <td><?= $row['dateR'] ?></td>
                                <td id="td1"><?= $row['nbC'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>