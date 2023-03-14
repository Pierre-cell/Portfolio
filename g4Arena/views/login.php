<?php

session_start();

//connection à la bdd
require_once('C:\wamp64\www\g4arena\configbdd.php');

$affich_users = $bdd->prepare('SELECT * FROM users');
$affich_users->execute(array());
$affichage = $affich_users->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body style="background: #002038;">

  <a href="/index.php">
    <button class="BtnRetour"> Retourner à la page d'accueil</button>
  </a>

  <div class="center">
    <h1>Se connecter</h1>
    <form action="./login_controller.php" method="post">
      <div class="txt_field">
        <input type="text" name="email" required>
        <span></span>
        <label>Email</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Mot de passe</label>
      </div>
      <!-- <div class="pass">Mot de passe oublié ?</div>-->
      <input type="submit" value="Connexion">
      <!--<div class="signup_link">
          Pas encore membre? <a href="#">S'inscrire</a>
        </div> -->
    </form>
  </div>
</body>

</html>