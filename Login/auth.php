<?php
require('bdd.php');


session_name('ma_session');
session_start();
$email = $_SESSION['email'];
$token = $_SESSION['token'];

if ($token) {

    $req = $bdd->prepare("SELECT * FROM client WHERE mel = '$email' AND token = '$token'");
    $req->execute(array('email' => $email, 'token' => $token));
    $rep = $req->fetch();

    if ($rep['prenom'] != false) {


            $email = $rep['mel'];
            $mdp = $rep[''];
            $civilite = $rep['civilite'];
            $prenom = $rep['prenom'];
            $nom = $rep['nom'];
            $adresse = $rep['adresse'];
            $codePostal = $rep['code_postal'];
            $ville = $rep['ville'];
            $telephone = $rep['telephone'];
            $civilite = $rep['civilite'];

        $client=new Client($email,$mdp,$civilite,$prenom,$nom,$adresse,$codePostal,$ville,$telephone);       

    } else {

        header("Refresh:0; url=login.php");
    }
} else {
    header("Refresh:0; url=login.php");
}


?>