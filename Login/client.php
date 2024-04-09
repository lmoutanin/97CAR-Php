<?php  

require('bdd.php');
 
 
session_name('ma_session');
session_start();
$email=$_SESSION['email'];
$token=$_SESSION['token'];

if ($token) {

   $req = $bdd->prepare("SELECT * FROM client WHERE mel = '$email' AND token = '$token'");
   $req->execute(array('email' => $email, 'token' => $token));
   $rep = $req->fetch();
       
   if ($rep['prenom'] != false) {
      $temp=2;
      
      header("Refresh:$temp ; url=information.php");
   
      
   }else {
 
      header("Refresh:0; url=login.php");
    
   }
} else {
  header("Refresh:0; url=login.php");
   
}
?>