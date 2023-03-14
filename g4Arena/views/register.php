<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <title>Document</title>
</head>

<body style="background: #002038;">

  <a href="/index.php">
    <button class="BtnRetour"> Retourner à la page d'accueil</button>
  </a>

  <div class="center">
    <h1>S'inscrire</h1>
    <form action="register_controller.php" method="post" action="_URL_" enctype="multipart/form-data">
      <div class="txt_field">
        <input type="text" required name="name">
        <span></span>
        <label>Nom</label>
      </div>
      <div class="txt_field">
        <input type="text" required name="email">
        <span></span>
        <label>Email</label>
      </div>
      <div class="txt_field">
        <input type="password" required name="password">
        <span></span>
        <label>Mot de passe</label>
      </div>
      <div class="txt_field">
        <input type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" maxlength="10" required name="tel">
        <span></span>
        <label>Numéro de téléphone</label>
      </div>
      <!-- <div class="txt_field">
        <input type="file" name="img" id="img">
        <span></span>
        <label>Votre image de profil (optionnel)</label>
      </div> -->
      <input type="submit" value="envoyer">
      <div class="signup_link">
      </div>
    </form>
  </div>
</body>

</html>