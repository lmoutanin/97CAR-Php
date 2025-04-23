<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

require('bdd.php');

$email = $_SESSION['email'];
$token = $_SESSION['token'];

if ($token) {

    $requete = $bdd->query("SELECT * FROM client");
    $rps = $requete->fetchAll();

    $requete = $bdd->query("SELECT * FROM voiture ");
    $repondres = $requete->fetchAll();

    $requete = $bdd->query("SELECT * FROM reparation ");
    $rpts = $requete->fetchAll();
} else {
    header("Refresh:0.001; url=./login.php");
}
