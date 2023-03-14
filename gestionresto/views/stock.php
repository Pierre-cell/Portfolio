<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stock.css">
    <script src="../js/ingredient.js"></script>
    <title>Stock</title>
    <?php $editForm = $bdd->query('SELECT * From editform Where id = 1');
    $editFormFetch = $editForm->fetch();
    $editValue = $editFormFetch['id']; ?>
</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="wrapper">
        <?php
        include 'navbar.php'
        ?>

        <div class="contenu">

        <br><br>
        
            <h1>STOCK</h1>

        <br><br>

            <form action="./ingredients.controller.php" method="post">
        <div class="popup">
            <div class="popup-content">
                <img src="../img/tete de ced.png" alt="Close" class="close" onclick="fermer();">
                <h1>Ajoutez un nouvel ingrédient </h1>
                <div class="titrenom">
                    <label class="lab">Nom de l'ingrédient: </label>
                    <input type="text" name="nom" class="addinput" max="10">
                </div>
                <div class="titrenom">
                    <label class="coteD">Quantité disponible : </label>
                    <input type="number" name="stock" class="addinput" min="1" placeholder="1">
                </div>
                <div class="titrenom">
                    <label class="lab">Date de péremption : </label>
                    <input type="date" name="dateP" class="addinput">
                </div>
                <div class="titrenom">
                    <label class="lab">Type d'ingrédient : </label>
                    <input type="text" name="typeI" class="addinput" max="10">
                </div>
                <div class="titrenom">
                    <label class="coteD">Allergènes : </label>
                    <select class="nomStar" name="numTable">
                        <?php
                        foreach ($aller as $al) {
                        ?>
                            <option value="<?= $al['nom'] ?>"><?= $al['nom'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" class="button" value="Ajouter"></input>
            </div>
        </div>
    </form>

            <div class="tableau">
                <table>
                    <thead>
                        <tr>
                            <th>Nom de l'ingrédient</th>
                            <th>Quantité disponible</th>
                            <th>Date de péremption</th>
                            <th>Type d'ingrédient</th>
                            <th>Allergènes</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $query = $bdd->query('SELECT * FROM `ingredients`');

                        $resultat = $query->fetchAll();

                        $querry = $bdd->query('SELECT * FROM `allergenes`');

                        $aller = $querry->fetchAll();

                        if ($editValue == 1) {
                        ?>

                            <?php foreach ($resultat as $row) { ?>
                                <form class="formulaire" action="./stock-controller.php" method="post">
                                    <tr>
                                        <td><?= $row['nom'] ?></td>
                                        <td><?= $row['stock'] ?></td>
                                        <td><?= $row['dateP'] ?></td>
                                        <td><?= $row['typeI'] ?></td>
                                        <td><?= $row['allergene'] ?></td>
                                        <td>
                                            <button id="crayon" name="edit">Editer</button>
                                            <input type="hidden" name="nom" value="<?= $row['nom'] ?>">
                                            <button name="poubelle" id="poubelle">Supprimer</button>
                                        </td>
                                    </tr>
                                </form>

                            <?php } ?>

                        <?php } else if ($editValue == null) { ?>

                            <?php foreach ($resultat as $row) { ?>
                                <form class="formulaire" action="./stock-controller.php" method="post">
                                    <tr>
                                        <td><?= $row['nom'] ?><input type="hidden" name="nom" value="<?= $row['nom'] ?>"></td>
                                        <td><input type="number" name="qte" value="<?= $row['stock'] ?>"></td>
                                        <td><?= $row['dateP'] ?></td>
                                        <td><?= $row['typeI'] ?></td>
                                        <td><?= $row['allergene'] ?></td>
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
    <div class="butadd">
        <button class="material-symbols-outlined" id="button" onclick="Afficher();">Ajouter un nouvel
            ingrédient</button>
    </div>


    </div>
    </div>

</body>

</html>