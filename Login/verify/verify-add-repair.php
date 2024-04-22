<?php

require('bdd.php');
require('class/Repair.php');


$msg_ins = "";
$error_msg = "";


//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {

    $date = $_POST['date'];
    $cout = $_POST['cout'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $id = 0;

    

    //  verifier si les champs marque,modele,kilometrage,immatriculation et année  ne sont pas vide
    if (!empty($date) && !empty($cout) && !empty($description) && !empty($quantite)) {
        $repair=new Repair($date,$cout,$quantite,$description,$id);
        $requete = $bdd->prepare("INSERT INTO type_reparation (id_reparation,descriptions,cout,quantite,date_reparation) VALUES (:id_reparation,:descriptions,:cout,:quantite,:dates)");

        $requete->bindParam(':id_reparation', $repair->get_id());
        $requete->bindParam(':descriptions', $repair->get_description());
        $requete->bindParam(':cout', $repair->get_cout());
        $requete->bindParam(':quantite', $repair->get_quantite());
        $requete->bindParam(':dates', $repair->get_date());

        // Exécution de la requête préparée


        $requete->execute();
        $msg_ins = "Ajout de la réparation .";
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
}
