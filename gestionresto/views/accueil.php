<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/accueil.css">
  <title>Accueil</title>
</head>

<body>

  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <div class="wrapper">
    <?php
    include 'navbar.php'
    ?>

    <div class="contenu">

      <div class="container">
        <div class="ligne-extra">

          <a href="commande.php"><button class="haut commande">PRENDRE UNE COMMANDE</button></a>
        </div>
        <div class="ligne-haut">
          <a href="reservation.php"> <button class="bouton reservation">RÉSERVATION</button></a>
          <a href="table.php"><button class="bouton table">TABLE</button></a>
        </div>
        <div class="ligne-bas">
          <a href="stock.php"><button class="bouton stock">STOCK</button></a>
          <a href="menus.php"><button class="bouton menus">MENUS</button></a>
        </div>
      </div>
    </div>
  </div>
  </div>

</body>

</html>