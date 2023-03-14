<?php require_once('C:\wamp64\www\gestionresto/configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reservation.css">
  <script src="../js/addform.js"></script>
  <title>Réservation</title>
  <?php $editForm = $bdd->query('SELECT * From editform Where id = 1');
  $editFormFetch = $editForm->fetch();
  $editValue = $editFormFetch['id']; ?>
</head>

<body>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <div class="wrapper">

    <?php
    include 'navbar.php'
    ?>


    <div class="contenu">

      <br>
      <h1>LES RÉSERVATIONS</h1>
      <br><br><br>

      <center>
        <div class"espace">
          <a class="salle bouton" href="reservation.php"> RÉSERVATIONS </a>
          <a class="salle bouton" href="salle1.php"> SALLE 1 </a>
          <a class="salle bouton" href="salle2.php"> SALLE 2 </a>
          <a class="salle bouton" href="salle3.php"> TERASSE </a>
        </div>
      </center>

      <br><br><br>

      <div class="butadd">
        <button class="material-symbols-outlined" id="bouton" onclick="Affiche();">Ajouter nouveau client</button>
      </div>

      <form action="./client.controller.php" method="post">
        <div class="popu">
          <div class="popup-content">
            <img src="../img/tete de ced.png" alt="Close" class="fermer" onclick="ferme();">
            <h1>Ajoutez un nouveau client</h1>
            <div class="titrenom">
              <label class="lab">E-mail : </label><br>
              <input type="email" placeholder="email@exemple.fr" name="mail" class="addinput">
            </div>
            <div class="titrenom">
              <label class="lab">Nom : </label><br>
              <input type="text" placeholder="MARTIN" name="nom" class="addinput">
            </div>
            <div class="titrenom">
              <label class="lab">Prénom : </label><br>
              <input type="text" placeholder="Jean" name="prenom" class="addinput">
            </div>
            <div class="titrenom">
              <label class="lab">Date de naissance : </label><br>
              <input type="date" name="naissance" class="addinput">
            </div>
            <div class="titrenom">
              <label class="lab">Genre : </label><br>
              <select class="nomStar" name="genre">
                <option value="">Genre</option>
                <option value="H">M</option>
                <option value="F">F</option>
              </select>
            </div>
            <div class="titrenom">
              <label class="coteD">Numéro de téléphone : </label>
              <input type="tel" name="telephone" class="addinput" placeholder="06 07 08 09 01">
            </div>
            <div class="titrenom">
              <label class="coteD">Ville : </label>
              <input type="text" name="ville" class="addinput" placeholder="Marseille">
            </div>
            <input onclick="showNotification()" type="submit" class="button" value="Ajouter"></input>

            <script>
              function showNotification() {
                toastr.success('Confirmation', 'Le client à bien été ajouté !')
              }
            </script>

          </div>
        </div>
      </form>

      <?php
      $client_infos = $bdd->prepare('SELECT mail FROM clients');
      $client_infos->execute();
      $client = $client_infos->fetchAll();

      $table_infos = $bdd->prepare('SELECT tables.num FROM tables LEFT JOIN reserver ON tables.num = reserver.tableR WHERE reserver.tableR IS NULL');
      $table_infos->execute();
      $table = $table_infos->fetchAll();
      ?>

      <br>

      <div class="butadd">
        <button class="material-symbols-outlined" id="button" onclick="Afficher();">Ajouter nouvelle réservation</button>
      </div>

      <form action="./reservation.controller.php" method="post">
        <div class="popup">
          <div class="popup-content">
            <img src="../img/tete de ced.png" alt="Close" class="close" onclick="fermer();">
            <h1>Ajoutez une nouvelle réservation</h1>
            <div class="titrenom">
              <label class="lab">Nom du client : </label>
              <select class="nomStar" name="nomC">
                <?php
                foreach ($client as $t) {
                ?>
                  <option value="<?= $t['mail'] ?>"><?= $t['mail'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="titrenom">
              <label class="lab">Date et heure : </label>
              <input type="datetime-local" placeholder="dateD" name="dateR" class="addinput">
            </div>
            <div class="titrenom">
              <label class="coteD">Nombre de couverts : </label>
              <input type="number" name="nbC" class="addinput" min="1" placeholder="1">
            </div>
            <div class="titrenom">
              <label class="coteD">N° de la table : </label>
              <select class="nomStar" name="numTable">
                <?php
                foreach ($table as $t) {
                ?>
                  <option value="<?= $t['num'] ?>"><?= $t['num'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <input onclick="showNotification()" type="submit" class="button" value="Ajouter"></input>

            <script>
              function showNotification() {
                toastr.success('Confirmation', 'Le client à bien été ajouté !')
              }
            </script>

          </div>
        </div>
      </form>

      <br><br>

      <div class="tableau">
        <table>
          <thead>
            <tr>
              <th>Nom de la réservation</th>
              <th>Numéro de la table</th>
              <th>Date et Heure</th>
              <th>Nombre de personnes</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $query = $bdd->query('SELECT clients.nom as clientnom ,clients.prenom as clientpre, reserver.client as clientr, tableR, dateR, nbC FROM `reserver`Inner join clients On reserver.client=clients.mail 
      ');

            $resultat = $query->fetchAll();




            if ($editValue == 1) {
            ?>

              <?php foreach ($resultat as $row) { ?>
                <form class="formulaire" action="./reservationmodif.php" method="post">
                  <tr>
                    <td><?= $row['clientnom'] . ' ' . $row['clientpre'] ?></td>
                    <td><?= $row['tableR'] ?></td>
                    <td><?= $row['dateR'] ?></td>
                    <td><?= $row['nbC'] ?></td>
                    <td>
                      <button id="crayon" name="edit">Editer</button>
                    </td>
                  </tr>
                </form>

              <?php } ?>

            <?php } else if ($editValue == null) { ?>

              <?php foreach ($resultat as $row) { ?>
                <form class="formulaire" action="./reservationmodif.php" method="post">
                  <tr>
                    <td><?= $row['clientnom'] . ' ' . $row['clientpre'] ?><input type="hidden" name="clientnom" value="<?= $row['clientr'] ?>"></td>
                    <td><?= $row['tableR'] ?></td>
                    <td><input type="datetime" name="dateR" value="<?= $row['dateR'] ?>"></td>
                    <td><input type="number" name="nbC" value="<?= $row['nbC'] ?>"></td>
                    <td>
                      <button id="crayon" name="editdisabled">Editer</button>
                      <input class="saveDisabled" type="submit" value="Sauvegarder" name="save" />
                    </td>

                  </tr>
                </form>
              <?php } ?>

            <?php } ?>

          </tbody>
        </table>
      </div>

      <br><br><br>


    </div>
  </div>
</body>

</html>