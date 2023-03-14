<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/priseco.css">
    <title>Table</title>
    <?php 
$editForm = $bdd->query('SELECT * From editform Where id = 1');
$editFormFetch = $editForm->fetch();

if ($editFormFetch) {
    $editValue = $editFormFetch['id'];
} else {
    $editValue = null;
}
?>

</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js%22%3E"></script>

    <div class="wrapper">
    <?php
    include 'navbar.php'
    ?>
    <div id="botn">
            <a class="salle bouton" href="tabler.php"> TABLES RÉSERVÉES </a>
            <a class="salle bouton" href="prise.php"> COMMANDES EN COURS </a>
            <a class="salle bouton" href="historique.php"> HISTORIQUES </a>
        </div>
        <div class="contenu">

            <h1> COMMANDES ACTUELLEMENT EN COURS </h1>
            <div class="tableau">
                <table>
                    <thead>
                        <tr>
                            <th>Nom du client</th>
                            <th>Numéro de la table</th>
                            <th>Date et heure de réservation</th>
                            <th>Plats</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $query = $bdd->query('SELECT *
                        FROM commander
                        ORDER BY tableC
                      
      ');

                        $resultat = $query->fetchAll();

                            if ($editValue == 1) {
                                ?>
        
                                    <?php foreach ($resultat as $row) { ?>
                                        <form class="formulaire" action="./prise.controller.php" method="post">
                                            <tr>
                                            <td><?= $row['client'] ?><input type="hidden" name="client" value="<?= $row['client'] ?>"></td>
                                        <td id="td1"><?= $row['tableC'] ?><input type="hidden" name="tableC" value="<?= $row['tableC'] ?>"></td>
                                        <td><?= $row['dateC'] ?></td>
                                        <td id="td1"><?= $row['plat'] ?><input type="hidden" name="plat" value="<?= $row['plat'] ?>"></td>
                                        <td><?= $row['qte'] ?></td>
                                                <td>
                                                    <button id="crayon" name="edit">Editer</button>
                                                    <input type="hidden" name="client" value="<?= $row['client'] ?>">
                                                    <button name="poubelle" id="poubelle">Supprimer</button>
                                                </td>
                                            </tr>
                                        </form>
        
                                    <?php } ?>
        
                                <?php } else if ($editValue == null) { ?>
        
                                    <?php foreach ($resultat as $row) { ?>
                                        <form class="formulaire" action="./prise.controller.php" method="post">
                                            <tr>
                                            <td><?= $row['client'] ?><input type="hidden" name="client" value="<?= $row['client'] ?>"></td>
                                            
                                        <td id="td1"><?= $row['tableC'] ?></td>
                                        <td><?= $row['dateC'] ?></td>
                                        <td id="td1"><?= $row['plat'] ?></td>
                                        <td><input type="number" name="qte" value="<?= $row['qte'] ?>"></td>
                                                <td>
                                                    <button id="crayon" name="editdisabled">Editer</button>
                                                    <input class="saveDisabled" type="submit" value="Sauvegarder" name="save" />
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
        
                                <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
