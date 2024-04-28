<?php
session_start();
require('bdd.php');
require('class/Repair.php');
require('verify/restricted-access.php');



$msg_ins = "";
$error_msg = "";


//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {


    $cout = $_POST['cout'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $id = 0;




    //  verifier si les champs marque,modele,kilometrage,immatriculation et année  ne sont pas vide
    if (!empty($cout) && !empty($description)) {
        $repair = new Repair($cout, $quantite, $description, $id);
        $requete = $bdd->prepare("INSERT INTO reparation (Id_reparation,descriptions,cout,quantite) VALUES (0,?,?,?)");



        $requete->bindParam(1, $repair->get_description());
        $requete->bindParam(2, $repair->get_cout());
        $requete->bindParam(3, $repair->get_quantite());


        if ($requete->execute()) {
            $msg_ins = "Ajout de la réparation .";
        } else {
            echo "Erreur : Impossible d'exécuter la requête.";
        }
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
}
