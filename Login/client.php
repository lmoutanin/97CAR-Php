<?php  

require('bdd.php');
 
$deconnexion=3600;
$email = $_COOKIE['email'];
$token = $_COOKIE['token'];

if ($token) {

   $req = $bdd->prepare("SELECT * FROM client WHERE mel = '$email' AND token = '$token'");
   $req->execute(array('email' => $email, 'token' => $token));
   $rep = $req->fetch();

   if ($rep['prenom'] != false) {

      echo $rep['prenom'];
     
      header("Refresh:$deconnexion ; url=login.php");
   }else {
 
      header("Refresh:0; url=login.php");
    
   }
} else {
  header("Refresh:0; url=login.php");
   
}
?>