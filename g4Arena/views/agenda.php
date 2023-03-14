<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>G4 Arena Calendrier</title>

  <link rel="stylesheet" href="/ressources/css/agenda.css">
</head>

<body>


  <?php
  require_once('C:\wamp64\www\g4arena\configbdd.php');
  session_start();
  include './navbar.php';
  $_SESSION['current_page'] = $_SERVER['REQUEST_URI']

  ?>
  <div id="container">
    <div id="header">
      <div id="monthDisplay"></div>
      <div>
        <button id="backButton">Précédent</button>
        <button id="nextButton">Suivant</button>
      </div>
    </div>

    <div id="weekdays">
      <div>Lundi</div>
      <div>Mardi</div>
      <div>Mercredi</div>
      <div>Jeudi</div>
      <div>Vendredi</div>
      <div>Samedi</div>
      <div>Dimanche</div>
    </div>

    <div id="calendar"></div>
  </div>

  <div id="newEventModal">
    <h2>Nouvelle evenement</h2>

    <input id="eventTitleInput" placeholder="Titre" />

    <input type="file" id="image-input" accept="image/jpeg, image/png, image/jpg">
    <div id="display-image"></div>


    <br>

    <button id="saveButton">Sauvegarder</button>
    <button id="cancelButton">Annuler</button>
  </div>

  <div id="deleteEventModal">
    <h2>Evenenement</h2>

    <p id="eventText"></p>

    <button id="deleteButton">Supprimer</button>
    <button id="closeButton">Fermer</button>
  </div>

  <div id="modalBackDrop"></div>

  <?php
  include './footer.php';
  ?>

  <script src="/ressources/js/agenda.js"></script>
</body>

</html>