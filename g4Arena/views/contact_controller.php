 
 <?php

   if(isset($_POST["envoyer"])) { // dans le form le name=" c'est envoyer"
     $nom = $_POST["lastname"];
     $prenom = $_POST["firstname"];
     $email = $_POST["mail"];
     $subject = $_POST["sujet"];
     $message = $_POST["message"];
     $toEmail = "cedricjambon13@gmail.com";
     $mailHeaders = "From: " . $nom . "<". $email .">\r\n";
     $conf = mail("cedricjambon13@gmail.com", $_POST["sujet"], $_POST["message"], "From:" .$_POST["mail"] );
     if ($conf){
        echo "L'email a bien été envoyé";
     }
     else {
        echo "l'email n'a pas été envoyé";
     }
      
    }
  
?> 
