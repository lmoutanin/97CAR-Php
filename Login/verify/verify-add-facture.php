<?php
session_start();
require('bdd.php');
require('class/Repair.php');



 
$msg_ins = "";
$error_msg = "";
 
//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {


    $id = 0;
    $id_client = $_SESSION['id-client'];
    $id_voiture = $_SESSION['id-voiture'];
    $date = $_POST['date'];

    $description = $_POST['description'];
    $cout = $_POST['cout'];
    $quantite = $_POST['quantite'];

   
 //table 1
    if (!empty($quantite) && !empty($cout) && !empty($description)) {

        $repair = new Repair($cout, $quantite, $description, $id);
        $requete = $bdd->prepare("INSERT INTO reparation (descriptions,cout,quantite) VALUES (?,?,?)");



        $requete->bindParam(1, $repair->get_description());
        $requete->bindParam(2, $repair->get_cout());
        $requete->bindParam(3, $repair->get_quantite());
        $requete->execute();


        $id_reparation = $bdd->lastInsertId();
        
 
         
        $requete = $bdd->prepare("INSERT INTO facture (date_facture,Id_client,Id_voiture) VALUES (?,?,?)");



        $requete->bindParam(1,  $date);
        $requete->bindParam(2, $id_client);
        $requete->bindParam(3, $id_voiture);
        
        $requete->execute();
        $id_facture = $bdd->lastInsertId();
    

        $requete = $bdd->prepare("INSERT INTO facture_reparation (Id_facture,Id_reparation) VALUES (?,?)");
        $requete->bindParam(1,  $id_facture);
        $requete->bindParam(2, $id_reparation);
        $requete->execute();
        
         

        $description = $_POST['description2'];
        $cout = $_POST['cout2'];
        $quantite = $_POST['quantite2'];
    }

    //Table 2
    if (!empty($quantite) && !empty($cout) && !empty($description)) {

        $repair = new Repair($cout, $quantite, $description, $id);
        $requete = $bdd->prepare("INSERT INTO reparation (descriptions,cout,quantite) VALUES (?,?,?)");



        $requete->bindParam(1, $repair->get_description());
        $requete->bindParam(2, $repair->get_cout());
        $requete->bindParam(3, $repair->get_quantite());
        $requete->execute();


        $id_reparation = $bdd->lastInsertId();
        
 
         
        $requete = $bdd->prepare("INSERT INTO facture (date_facture,Id_client,Id_voiture) VALUES (?,?,?)");



        $requete->bindParam(1,  $date);
        $requete->bindParam(2, $id_client);
        $requete->bindParam(3, $id_voiture);
        
        $requete->execute();
        $id_facture = $bdd->lastInsertId();
    

        $requete = $bdd->prepare("INSERT INTO facture_reparation (Id_facture,Id_reparation) VALUES (?,?)");
        $requete->bindParam(1,  $id_facture);
        $requete->bindParam(2, $id_reparation);
        $requete->execute();
        
         

        $description = $_POST['description3'];
        $cout = $_POST['cout3'];
        $quantite = $_POST['quantite3'];
    }


     //Table 3
     if (!empty($quantite) && !empty($cout) && !empty($description)) {

        $repair = new Repair($cout, $quantite, $description, $id);
        $requete = $bdd->prepare("INSERT INTO reparation (descriptions,cout,quantite) VALUES (?,?,?)");



        $requete->bindParam(1, $repair->get_description());
        $requete->bindParam(2, $repair->get_cout());
        $requete->bindParam(3, $repair->get_quantite());
        $requete->execute();


        $id_reparation = $bdd->lastInsertId();
        
 
         
        $requete = $bdd->prepare("INSERT INTO facture (date_facture,Id_client,Id_voiture) VALUES (?,?,?)");



        $requete->bindParam(1,  $date);
        $requete->bindParam(2, $id_client);
        $requete->bindParam(3, $id_voiture);
        
        $requete->execute();
        $id_facture = $bdd->lastInsertId();
    

        $requete = $bdd->prepare("INSERT INTO facture_reparation (Id_facture,Id_reparation) VALUES (?,?)");
        $requete->bindParam(1,  $id_facture);
        $requete->bindParam(2, $id_reparation);
        $requete->execute();
        
         

        $description = $_POST['description4'];
        $cout = $_POST['cout4'];
        $quantite = $_POST['quantite4'];
    }

    //Table 3
    if (!empty($quantite) && !empty($cout) && !empty($description)) {

        $repair = new Repair($cout, $quantite, $description, $id);
        $requete = $bdd->prepare("INSERT INTO reparation (descriptions,cout,quantite) VALUES (?,?,?)");



        $requete->bindParam(1, $repair->get_description());
        $requete->bindParam(2, $repair->get_cout());
        $requete->bindParam(3, $repair->get_quantite());
        $requete->execute();


        $id_reparation = $bdd->lastInsertId();
        
 
         
        $requete = $bdd->prepare("INSERT INTO facture (date_facture,Id_client,Id_voiture) VALUES (?,?,?)");



        $requete->bindParam(1,  $date);
        $requete->bindParam(2, $id_client);
        $requete->bindParam(3, $id_voiture);
        
        $requete->execute();
        $id_facture = $bdd->lastInsertId();
    

        $requete = $bdd->prepare("INSERT INTO facture_reparation (Id_facture,Id_reparation) VALUES (?,?)");
        $requete->bindParam(1,  $id_facture);
        $requete->bindParam(2, $id_reparation);
        $requete->execute();
        
         

        
    }


     


     

     



























 
}
  