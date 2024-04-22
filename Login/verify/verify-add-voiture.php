<?php
session_start();
require('bdd.php');
require('class/Voiture.php');
require('verify/restricted-access.php');
 
  

$msg_ins = "";
$error_msg = "";

 
 
//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {




    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $kilometrage = $_POST['kilometrage'];
    $imma = $_POST['imma1'] . '-' . $_POST['imma2'] . '-' . $_POST['imma3'];
    $annee = date('Y', strtotime($_POST['annee']));
    $id = $_SESSION['id'];

    //  verifier si les champs marque,modele,kilometrage,immatriculation et année  ne sont pas vide
    if (!empty($marque) && !empty($modele) && !empty($kilometrage) && !empty($imma) && !empty($annee) && !empty($id)) {

        $voiture = new Voiture($marque, $imma, $modele, $kilometrage, $annee, $id,0);
        $req = $bdd->prepare("SELECT * FROM voiture WHERE immatriculation = :immatriculation");
        $req->execute(array('immatriculation' => $voiture->get_immatriculation()));
        $immatriculation = $req->fetch();

        //verifier si immatriculation est différence des autre dans la base de données 
        if (!$immatriculation) {

             // envoyer dans la base donnée une requête pour ajoute les valeurs  suivantes dans la table voiture
            $req = $bdd->prepare("INSERT INTO voiture (Id_voiture,annee,marque,kilometrage,modele,immatriculation,Id_client  ) VALUES(0,:annee,:marque,:kilometrage,:modele,:immatriculation,:Id_client)");
            $req->execute(array('annee' => $voiture->get_annee(), ':marque' => $voiture->get_marque(), ':kilometrage' => $voiture->get_kilometrage(), ':modele' => $voiture->get_modele(), ':immatriculation' => $voiture->get_immatriculation(), ':annee' => $voiture->get_annee(), ':Id_client' => $voiture->get_id_client()));

          
            $msg_ins = "Ajout de la {$voiture->get_marque()} à {$voiture->get_modele()} .";
            
          
             //Sinon affiche immatriculation  n'est pas disponible.
        } else {
            $error_msg = "Désolé, mais cette immatriculation n'est pas disponible.";
        }
        
        //Sinon affiche Veuillez remplir tous les champs !
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
}
