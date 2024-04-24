<?php
session_start();
require('bdd.php');
 
require('verify/restricted-access.php');
 

$msg_ins = "";
$error_msg = "";

 
 
//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {
    $email = $_POST['email'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $id=$_SESSION['id-client'];

    //  verifier si les champs email , mdp ,civilite ,prenom ,nom ,adresse , codePostal ,ville et telephone  ne sont pas vide
    if (!empty($email) &&   !empty($prenom) &&  !empty($nom)   &&  !empty($adresse)   &&  !empty($codePostal)   &&  !empty($ville) &&  !empty($telephone)) {
 


            //verifier si l'email est différent des autre email dans la base de données 
            

                // envoyer dans la base donnée une requête pour ajoute les valeurs  suivantes dans la table acheteur 
                $update_req = $bdd->prepare("UPDATE client SET mel = :mel AND nom = :nom AND prenom = :prenom AND telephone = :telephone AND ville =:ville AND adresse = :adresse AND code_postal = :code_postal WHERE Id_client = :id");
                $update_req->execute(array('mel' => $email ,'nom' =>$nom, 'prenom' =>$prenom,'telephone' => $telephone,'ville' =>$ville,'adresse' =>$adresse,'code_postal'=>$codePostal,'id'=>$id));

                 


                //Sinon affiche L'adresse mail existe déjà.
            
            //Sinon affiche Veuillez information non filtre  !
          
        //Sinon affiche Veuillez remplir tous les champs !
    } else {
        $error_msg = "<p>Veuillez remplir tous les champs !</p>";
    }  
 
}