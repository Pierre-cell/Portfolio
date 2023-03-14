<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reservation.css">
  <title>Salle 1</title>
</head>

<body>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <div class="wrapper">
  <?php
  include 'navbar.php'
  ?>
 

    <div class="contenu">

      <br>
      <h1>SALLE 1</h1>
      <br><br><br>

      <center>
      <a class="salle bouton" href="reservation.php"> RÉSERVATIONS </a>
      <a class="salle bouton" href="salle1.php"> SALLE 1 </a>
      <a class="salle bouton" href="salle2.php"> SALLE 2 </a>
      <a class="salle bouton" href="salle3.php"> TERASSE </a>
      </center>

      <br><br><br>

      <div class="tableau">
        <table>
          <thead>
            <tr>
              <th>Numéro de table</th>
              <th>Nom de la réservation</th>
              <th>Nombre de personnes</th>
              <th>Date et Heure</th>
              <th>Numéro de la salle</th>
            </tr>
          </thead>
          <tbody>


            <?php
            $query = $bdd->query('SELECT clients.nom as clientnom, clients.prenom as clientpre, tableR, ranger.salle as salle, dateR, nbC FROM `reserver`Inner join clients On reserver.client=clients.mail Inner join tables On reserver.tableR=tables.num Inner join ranger On tables.num=ranger.tableS where ranger.salle="salle 1"
      ');

            $resultat = $query->fetchAll();

            foreach ($resultat as $row) {

            ?>
              <tr>
                <td><?= $row['tableR'] ?></td>
                <td><?= $row['clientnom'] . " " . $row['clientpre'] ?></td>
                <td><?= $row['nbC'] ?></td>
                <td><?= $row['dateR'] ?></td>
                <td><?= $row['salle'] ?></td> <?php } ?>
              </tr>
          </tbody>
        </table>
      </div>
    


    </div>
  </div>
</body>

</html>