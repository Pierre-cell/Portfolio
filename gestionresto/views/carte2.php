<?php require_once('C:\wamp64\www\gestionresto/configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/carteent.css">
  <script src="../js/carte.js"></script>
  <title>Menus</title>
</head>

<body>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <div class="wrapper">
    <?php
    include 'navbar.php'
    ?>


    <div class="contenu">

      <br>
      <h1> LA CARTE - LE CASTEAU </h1><br>

      <div class="bouton-categorie">
      <a href="carte.php"> <button class="bitton">Entrées</button> </a>
        <a href="carte2.php"> <button class="bitton">Plats</button> </a>
        <a href="carte3.php"> <button class="bitton">Boissons</button> </a>
        <a href="carte4.php"> <button class="bitton">Desserts</button> </a><br>
    </div>


    <div class="tableau">
                <table>
                    <br>
                    <thead>
                        <tr>
                            <th>Nom du plat</th>
                            <th>Description du produit</th>
                            <th>Prix</th>
                            <th>Categorie</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                $query = $bdd->query('SELECT nom,dp,prix,categorie FROM plats where categorie="Plats"');
                

                $resultat = $query->fetchAll();

                ?>

<?php foreach ($resultat as $row) { ?>
    <form class="formulaire" action="./carte-supprimer.php" method="post">
        <tr>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['dp'] ?></td>
            <td><?= $row['prix'] ?></td>
            <td><?= $row['categorie'] ?></td>
            <td>
                <input type="hidden" name="nom" value="<?= $row['nom'] ?>">
                <button type="submit">Supprimer</button>
            </td>
        </tr>
    </form>
<?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="butadd">
                <button class="material-symbols-outlined" id="button" onclick="Afficher();">Ajouter un nouveau plat</button>
            </div>

        </div>




        <form action="carte2.controller.php" method="post">
            <div class="popup">
                <div class="popup-content">
                    <img src="../img/tete de ced.png" alt="Close" class="close" onclick="fermer();">
                    <h1>Ajoutez un nouveau plat </h1>
                    <div>
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div>
                        <label for="dp">Description :</label>
                        <textarea id="dp" name="dp" required></textarea>
                    </div>
                    <div>
                        <label for="prix">Prix :</label>
                        <input type="number" id="prix" name="prix" step="1" min="0" required>
                    </div>
                    <div>
                        <label for="categories">Catégorie :</label>
                        <select id="categories" name="categories" required>
                            <option value="" selected disabled hidden>-- Sélectionner une catégorie --</option>
                            <option value="Entrées">Entrées</option>
                            <option value="Plats">Plats</option>
                            <option value="Desserts">Desserts</option>
                            <option value="Boissons">Boissons</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit">Ajouter</button>
                    </div>
                </div>
            </div>
        </form>

        <br><br><br><br><br>

</body>

</html>