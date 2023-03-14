<?php require_once('C:\wamp64\www\gestionresto\configbdd.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/clients.css">
  <script src="../js/addform.js"></script>
  <script src="../js/clients.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

  <title>Clients</title>
</head>

<body>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <div class="wrapper">

  <?php
        include 'navbar.php'
        ?>
  

<div class="contenu">

      <br>
      <h1>LES CLIENTS</h1>
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
            <label class="lab">Mail : </label>
            <input type="email" placeholder="exemple@exemple.fr" name="mail" class="addinput">
          </div>
          <div class="titrenom">
            <label class="lab">Nom : </label>
            <input type="text" placeholder="MARTIN" name="nom" class="addinput">
          </div>
          <div class="titrenom">
            <label class="lab">Prénom : </label>
            <input type="text" placeholder="Jean" name="prenom" class="addinput">
          </div>
          <div class="titrenom">
            <label class="lab">Date de naissance : </label>
            <input type="date" name="naissance" class="addinput">
          </div>
          <div class="titrenom">
            <select class="nomStar" name="genre">
              <option value="">Genre</option>
              <option value="H">M</option>
              <option value="F">F</option>
            </select>
          </div>
          <div class="titrenom">
            <label class="coteD">Numéro de téléphone : </label>
            <input type="tel" name="telephone" class="addinput" placeholder="0607080901">
          </div>
          <div class="titrenom">
            <label class="coteD">Ville : </label>
            <input type="text" name="ville" class="addinput" placeholder="Marseille">
          </div>
          <input type="submit" class="button" value="Ajouter"></input>

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

     
    <br><br>

    <div class="tableau">
        <table>
          <thead>
            <tr>
              <th>E-mail du client</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Naissance</th>
              <th>Telephone</th>
              <th>Ville</th>
            </tr>
          </thead>
          <tbody>

      <?php
            $query = $bdd->query('SELECT mail, nom, prenom, naissance, telephone, ville
            FROM clients 
      ');

            $resultat = $query->fetchAll();

            foreach ($resultat as $row) {

            ?>
              <tr>
                <td><?= $row['mail'] ?></td>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['naissance'] ?></td>
                <td><?= $row['telephone'] ?></td>
                <td><?= $row['ville'] ?></td>
                
                
                <?php } ?>
              </tr>
          </tbody>
        </table>
      </div>
  
      <br><br><br>

  </div>
            </div>  
</body>

</html>