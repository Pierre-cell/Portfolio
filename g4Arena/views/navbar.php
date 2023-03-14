<?php
//connection à la bdd
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
require_once('C:\wamp64\www\g4arena\configbdd.php');

if (isset($_SESSION['user'])) {

  $affich_users = $bdd->prepare('SELECT * FROM users WHERE id=?');
  $affich_users->execute(array($_SESSION['user']));
  $affichage = $affich_users->fetch();
}
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link href="/ressources/css/navbar.css" rel="stylesheet" type="text/css" />
  <script src="https://kit.fontawesome.com/4adc553856.js" crossorigin="anonymous"></script>
</head>

<body>
  <header class="header">
    <div class="brand">

      <nav class="nav is-active" id="nav">
        <a href="/index.php" class="brand-logo">
          <img class="logoblanc" src="/ressources/img/logoblanc.png" alt="" width="200px">
        </a>
        <a href="/ressources/views/agenda.php" class="nav-link">
          <p>AGENDA</p>
        </a>
        <a href="/ressources/views/billeterie.php" class="nav-link">BILLETERIE</a>

        <a href="/ressources//views/apropos.php" class="nav-link">A PROPOS</a>
        <a href="/ressources/views/contact.php" class="nav-link">CONTACT</a>

        <div class="accountTitle">

          <?php
          if (isset($_SESSION['user'])) {
          ?>
            <a href="/ressources/views/profil.php">
              <img src="<?= $affichage['img_url'] ?>" style="width:40px; height:40px; border-radius:30px;"></a>
            <div class="dropbtn">
              <a href="/ressources/views/profil.php" class="compteButton" style="top:85px ; right: 75px;"><?= $affichage['name'] ?></a>
              <a href="/ressources/views/logout.php" class="compteButton" style="top:100px ; right: 40px;">Se deconnecter</a>
            </div>
        </div>
      <?php
          }
      ?>
      <?php
      if (empty($_SESSION['user'])) {
      ?>
        <a href="/ressources/views/login.php" class="compte">
          <i class="fa-solid fa-user fa-xl" style="margin-top: 35px; height:40px;"></i>
        </a>
        <div class="dropbtn">
          <a href="/ressources/views/login.php" class="compteButton" style="top:75px ; right: 55px;">Connexion</a>
          <a href="/ressources/views/register.php" class="compteButton" style="top:100px ; right: 65px;">S'inscrire</a>
        </div>
    </div>

  <?php
      }
  ?>

  </nav>
  </header>

</body>

</html>