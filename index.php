<?php

session_start();

//connection à la bdd
require_once('C:\wamp64\www\g4arena\configbdd.php');
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./ressources/css/accueil.css">

  <!--fonction cookie-->
  <script src="/tarteaucitron/tarteaucitron.js"></script>

  <script type="text/javascript">
    tarteaucitron.init({
      "privacyUrl": "",
      /* Privacy policy url */
      "bodyPosition": "bottom",
      /* or top to bring it as first element for accessibility */

      "hashtag": "#tarteaucitron",
      /* Open the panel with this hashtag */
      "cookieName": "tarteaucitron",
      /* Cookie name */

      "orientation": "middle",
      /* Banner position (top - bottom) */

      "groupServices": false,
      /* Group services by category */
      "serviceDefaultState": "wait",
      /* Default state (true - wait - false) */

      "showAlertSmall": false,
      /* Show the small banner on bottom right */
      "cookieslist": false,
      /* Show the cookie list */

      "closePopup": false,
      /* Show a close X on the banner */

      "showIcon": true,
      /* Show cookie icon to manage cookies */
      //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
      "iconPosition": "BottomRight",
      /* BottomRight, BottomLeft, TopRight and TopLeft */

      "adblocker": false,
      /* Show a Warning if an adblocker is detected */

      "DenyAllCta": true,
      /* Show the deny all button */
      "AcceptAllCta": true,
      /* Show the accept all button when highPrivacy on */
      "highPrivacy": true,
      /* HIGHLY RECOMMANDED Disable auto consent */

      "handleBrowserDNTRequest": false,
      /* If Do Not Track == 1, disallow all */

      "removeCredit": false,
      /* Remove credit link */
      "moreInfoLink": true,
      /* Show more info link */

      "useExternalCss": false,
      /* If false, the tarteaucitron.css file will be loaded */
      "useExternalJs": false,
      /* If false, the tarteaucitron.js file will be loaded */

      //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

      "readmoreLink": "",
      /* Change the default readmore link */

      "mandatory": true,
      /* Show a message about mandatory cookies */
      "mandatoryCta": true /* Show the disabled accept button when mandatory on */
    });
    tarteaucitron.user.googlemapsKey = 'API KEY';
    (tarteaucitron.job = tarteaucitron.job || []).push('googlemaps');
    (tarteaucitron.job = tarteaucitron.job || []).push('youtube');
  </script>


  <title>G4 ARENA</title>
</head>

<body>
  <div>
    <img class="fond" src="/ressources/img/fond3.jpg" alt="salle"></img>
    <div class="logodiv">
      <img class="logoclc" src="/ressources/img/logo.png"></img>
    </div>
    <div class="menu">
      <a href="/ressources/views/agenda.php" class="menu__link ">
        AGENDA
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 152.9 43.4" style="enable-background:new 0 0 152.9 43.4;" xml:space="preserve">
          <path d="M151.9,13.6c0,0,3.3-9.5-85-8.3c-97,1.3-58.3,29-58.3,29s9.7,8.1,69.7,8.1c68.3,0,69.3-23.1,69.3-23.1 s1.7-10.5-14.7-18.4" />
        </svg>
      </a>
      <a href="/ressources/views/billeterie.php" class="menu__link">
        BILLETERIE
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 152.9 43.4" style="enable-background:new 0 0 152.9 43.4;" xml:space="preserve">
          <path d="M151.9,13.6c0,0,3.3-9.5-85-8.3c-97,1.3-58.3,29-58.3,29s9.7,8.1,69.7,8.1c68.3,0,69.3-23.1,69.3-23.1 s1.7-10.5-14.7-18.4" />
        </svg>
      </a>


      <a href="/ressources//views/apropos.php" class="menu__link">
        A PROPOS
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 152.9 43.4" style="enable-background:new 0 0 152.9 43.4;" xml:space="preserve">
          <path d="M151.9,13.6c0,0,3.3-9.5-85-8.3c-97,1.3-58.3,29-58.3,29s9.7,8.1,69.7,8.1c68.3,0,69.3-23.1,69.3-23.1 s1.7-10.5-14.7-18.4" />
        </svg>
      </a>
      <a href="/ressources/views/contact.php" class="menu__link">
        CONTACT
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 152.9 43.4" style="enable-background:new 0 0 152.9 43.4;" xml:space="preserve">
          <path d="M151.9,13.6c0,0,3.3-9.5-85-8.3c-97,1.3-58.3,29-58.3,29s9.7,8.1,69.7,8.1c68.3,0,69.3-23.1,69.3-23.1 s1.7-10.5-14.7-18.4" />
        </svg>
      </a>
    </div>
    <div class="area">
      <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <?php
    $event_values = new mysqli("localhost", "root", "", "g4_arena");
    $event_values->set_charset("utf8");
    $requete = 'SELECT * FROM evenements WHERE id=id';
    $resultat = $event_values->query($requete);
    ?>

    <div class="prog">

      <?php
      foreach ($resultat as $row) {
      ?>
        <div class="boite">
          <div class="guetta" style="background-image:url(<?= $row['img_acc'] ?>);">
            <div class="infos">
              <p class="date"> <?= $row['date_d'] ?></p>
              <p class="heure"><?= $row['heure'] ?></p>
              <p class="artiste"><?= $row['star_name'] ?></p></br></br>
              <a href="/ressources/views/infoEvenement.php?id=<?= $row['id'] ?>">
                <input class="formbutton" type="submit" name="reserver" value="Réserver">
              </a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
      <!-- <div class="boite">
        <a href="./infoEvenement.php?id=<?= $row['id'] ?>">
          <div class="ninho">
            <div class="infos">
              <p>17 DECEMBRE 2022</br></br>
                Ninho</br></br>
                A partir de : <b>45,00€</b></p></br>
              <a href="./infoEvenement.php?id=<?= $row['id'] ?>">
                <input class="formbutton" type="submit" name="reserver" value="Réserver">
              </a>
            </div>
          </div>
        </a>
      </div>
      <div class="boite">
        <a href="/ressources/views/billeterie.php">
          <div class="serpent">
            <div class="infos">
              <p>18 DECEMBRE 2022</br></br>
                Dj SNAKE</br></br>
                A partir de : <b>45,00€</b></p></br>
              <a href="./infoEvenement.php?id=<?= $row['id'] ?>">
                <input class="formbutton" type="submit" name="reserver" value="Réserver">
              </a>
            </div>
          </div>
        </a>
      </div> -->
    </div>
</body>

</html>