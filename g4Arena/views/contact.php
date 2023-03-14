<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G4 Arena contact</title>
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
<?php
session_start();
//connection à la bdd
require_once ('C:\wamp64\www\g4arena\configbdd.php');
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
include './navbar.php';
?>
<div class="center">
      <h1>Contactez nous !</h1>
      <form class="formulaire" action="./contact_controller.php" method="post">
        <div class="txt_fieldform">
          <input type="text" name="lastname" required>
          <span></span>
          <label>Nom</label>
        </div>
        <div class="txt_fieldform">
          <input type="text" name="firstname" required>
          <span></span>
          <label>Prenom</label>
        </div>
        <div class="txt_fieldform">
          <input type="text" name="mail" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_fieldform">
          <input type="text"  name="sujet" required>
          <span></span>
          <label>Sujet</label>
        </div>
        <div class="txt_fieldform">
          <textarea name="message" cols="95" rows="10"></textarea>
          <span></span>
          <label>message</label>
        </div>
        <input class="formbutton" type="submit" name="envoyer" value="Envoyer">
      </form>
</div>


<form class="news" action="./newsletter.php" method="post">
     <p>Inscrivez-vous à notre Newsletter !</p>
    <br/>
    <div class="txt_fieldmail">
          <input type="text" name="mail" required>
          <span></span>
          <label>Inscrivez votre E-mail</label>
        </div>
    <br/>
    <input class="newsbutton" type="submit" value="S'inscrire" />
</form>


</body>

<footer>
  <?php
  include './footer.php';
  ?>
</footer>
</html>


