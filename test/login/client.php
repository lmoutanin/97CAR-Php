<?php require('bdd.php');

$email = $_COOKIE['email'];
$token = $_COOKIE['token'];

$req = $bdd->prepare("SELECT * FROM client WHERE mel = '$email' AND token = '$token'");
$req->execute(array('email' => $email, 'token' => $token));
$rep = $req->fetch();

if ($token) {

   if ($rep['prenom'] != false) {
 
      echo "Vous êtes bien connecté" . $rep['prenom'];
   }
} else {
   header("Location login.php");
}
