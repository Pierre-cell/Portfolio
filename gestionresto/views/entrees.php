<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/carte.css">
  <title>Menus</title>
</head>

<body>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <div class="wrapper">
    <?php
    include 'navbar.php'
    ?>
 
  </div>

    <div class="contenu">

      <br>
      <h1> LA CARTE - LE CASTEAU </h1><br>

      <center>
      <div class="bouton-categorie">
      <a class="bitton" href="entrees.php"> Entrées </a>
      <a class="bitton" href="plats.php"> Plats </a>
      <a class="bitton" href="boissons.php"> Boissons </a>
      <a class="bitton" href="desserts.php"> Desserts </a>
      </div>
      </center>
  

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
                $query = $bdd->query('SELECT * FROM `plats`');

                $resultat = $query->fetchAll();

                foreach ($resultat as $row) {

                ?>
                    <tr>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['dp'] ?></td>
                        <td><?= $row['prix'] ?></td>
                        <td><?= $row['categorie'] ?></td><?php } ?>
                    </tr>
            </tbody>
        </table>
</div>
    

</body>

</html>