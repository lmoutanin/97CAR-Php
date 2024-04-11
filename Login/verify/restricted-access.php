<?php
require('bdd.php');

session_start();
$email = $_SESSION['email'];
$token = $_SESSION['token'];

if ($token) {

    $req = $bdd->prepare("SELECT * FROM client WHERE mel = '$email' AND token = '$token'");
    $req->execute(array('email' => $email, 'token' => $token));
    $rep = $req->fetch();

    if ($rep['prenom'] != false) {
       

    } else {

        header("Refresh:0; url=./login.php");
    }
} else {
    header("Refresh:0; url=./login.php");
}
