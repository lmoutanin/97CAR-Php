<?php
 session_start();

require('bdd.php');

$email = $_SESSION['email'];
$token = $_SESSION['token'];

if ($token) {

    $requete = $bdd->query("SELECT * FROM client");
    $rps = $requete->fetchAll();

    $requete = $bdd->query("SELECT * FROM voiture ");
    $repondres = $requete->fetchAll();

   
} else {
    header("Refresh:0; url=./login.php");
}
