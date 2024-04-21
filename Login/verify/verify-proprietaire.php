<?php
session_start();
require('bdd.php');
require('verify/restricted-access.php');
require('class/Client.php');

 

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

    //  verifier si les champs email , mdp ,civilite ,prenom ,nom ,adresse , codePostal ,ville et telephone  ne sont pas vide
    if (!empty($email) &&  !empty($prenom) &&  !empty($nom)   &&  !empty($adresse)   &&  !empty($codePostal)   &&  !empty($ville) &&  !empty($telephone)) {

        $cree = new Client($email, $prenom, $nom, $adresse, $codePostal, $ville, $telephone,0);
         


        //verifier si l'email à bien était nettoyer 
        if (filter_var($cree->get_email(), FILTER_VALIDATE_EMAIL)) {

            $req = $bdd->prepare("SELECT * FROM client WHERE mel = :email");
            $req->execute(array('email' => $cree->get_email()));
            $client = $req->fetch();


            //verifier si l'email est différent des autre email dans la base de données 
            if (!$client) {

                // envoyer dans la base donnée une requête pour ajoute les valeurs  suivantes dans la table acheteur 
                $req = $bdd->prepare("INSERT INTO client (id_client,mel,prenom,nom,adresse,code_postal,ville,telephone) VALUES(0,:mel,:prenom,:nom,:adresse,:code_postal,:ville,:telephone)");
                $req->execute(array('mel' => $cree->get_email(),'prenom' => $cree->get_prenom(), 'nom' => $cree->get_nom(), 'adresse' =>  $cree->get_adresse(), 'code_postal' => $cree->get_codePostal(), 'ville' => $cree->get_ville(), 'telephone' => $cree->get_telephone()));
                
                $msg_ins = "Ajout du Client {$cree->get_nom()}  {$cree->get_prenom()}  ";
                 
                


                //Sinon affiche L'adresse mail existe déjà.
            } else {

                $error_msg = "L'adresse mail existe déjà.";
            }
            //Sinon affiche Veuillez information non filtre  !
        } else {
            $error_msg = "<p>Email invalide !</p>";
        }
        //Sinon affiche Veuillez remplir tous les champs !
    } else {
        $error_msg = "<p>Veuillez remplir tous les champs !</p>";
    }
}
