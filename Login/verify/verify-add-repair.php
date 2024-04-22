<?php
session_start();
require('bdd.php');
 
 
  

$msg_ins = "";
$error_msg = "";

  
//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {
 
    $date=0;
    $cout = $_POST['cout'];
    $description= $_POST['description'];
    $quantite= $_POST['quantite'];
    $id=0;
     echo $date .' ' .$cout.' '.$description.' ' .$quantite;

    //  verifier si les champs marque,modele,kilometrage,immatriculation et année  ne sont pas vide
     
 

        $requete= $bdd->prepare("INSERT INTO type_reparation (id_reparation,descriptions,cout,quantite) VALUES (:id_reparation,:descriptions,:cout,:quantite)");
     
        $requete->bindParam(':id_reparation',$id);
        $requete->bindParam(':descriptions', $description);
        $requete->bindParam(':cout', $cout);
        $requete->bindParam(':quantite', $quantite);
         
        // Exécution de la requête préparée
        
 
        if($requete->execute()){
            echo "Nouvel enregistrement inséré avec succès.";
            } else{
            echo "Erreur : Impossible d'exécuter la requête.";
            }
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
 
