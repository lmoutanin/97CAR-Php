<?php
session_start();
require('bdd.php');
require('class/Repair.php');
 
  

$msg_ins = "";
$error_msg = "";

  
//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {
 
    $date = $_POST['date'];
    $cout = $_POST['cout'];
    $description= $_POST['description'];
    $quantite= $_POST['quantite'];
    $id=0;
     

    //  verifier si les champs marque,modele,kilometrage,immatriculation et année  ne sont pas vide
    if (!empty($date) && !empty($cout) && !empty($description) && !empty($quantite)) {

        $repair = new Repair($date,$cout,$quantite,$description,$id);

         
 

             // envoyer dans la base donnée une requête pour ajoute les valeurs  suivantes dans la table voiture
             $req = $bdd->prepare("INSERT INTO reparation (Id_reparation,description, date, cout, quantite) VALUES (:description, :date, :cout, :quantite)");
             $req->execute(array('description' => $repair->get_description(),'date' => $repair->get_date(),'cout' => $repair->get_cout(),'quantite' => $repair->get_quantite()));
             $msg_ins = "Ajout de la reparation {$repair->get_description()}.";
            
          
             //Sinon affiche immatriculation  n'est pas disponible.
        }  
        
        //Sinon affiche Veuillez remplir tous les champs !
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
 
