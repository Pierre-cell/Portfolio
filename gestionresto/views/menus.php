<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/menus.css">
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
      <h1> LES MENUS </h1>

      <div class="container">
        <div class="ligne-haut">
          
          <a href="../views/carte.php"><button class="bouton bouton-menu">MENU 1
            <p> Nombre de produits : 17 </p>
            <?php
            $query = $bdd->query('SELECT * FROM `allergenes`');

            $resultat = $query->fetchAll(); ?>
            <p><?php echo $resultat[0]['nom'] ?> </p>
            <p><?php echo $resultat[1]['nom'] ?> </p>
            <p><?php echo $resultat[2]['nom'] ?> </p>
</a></button>

          <button href="accueil.php" class="bouton bouton-menu">MENU 2 <br><br>
            <p>Nom du menu : MENU DU SOIR </p><br>
            <p> Nombre de produits : 21 </p>
          </button>
        </div>
        <div class="ligne-bas">
          <button href="accueil.php" class="bouton bouton-menu">MENU 3 <br><br>
            <p>Nom du menu : MENU DES FETES </p><br>
            <p> Nombre de produits : 24 </p>
          </button>
      
        </div>
      </div>

    </div>
  </div>

</body>

</html>