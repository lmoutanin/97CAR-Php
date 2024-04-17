<?php
require('bdd.php');
session_start();

$msg_ins = "";
$error_msg = "";

$id = $_SESSION['id'];
$requete = $bdd->prepare("SELECT * FROM voiture WHERE Id_client = :Id_client");
$requete->execute(array(':Id_client' => $id));
$repondres = $requete->fetchAll();



if (isset($_POST['ok'])) {

    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $kilometrage = $_POST['kilometrage'];
    $imma = $_POST['imma1'] . '-' . $_POST['imma2'] . '-' . $_POST['imma3'];
    $annee = date('Y', strtotime($_POST['annee']));
    $id = $_SESSION['id'];

    if (!empty($marque) && !empty($modele) && !empty($kilometrage) && !empty($imma) && !empty($annee)) {
        $voiture = new Voiture($marque, $imma, $modele, $kilometrage, $annee, $id);
        $req = $bdd->prepare("INSERT INTO voiture (Id_voiture,annee,marque,kilometrage,modele,immatriculation,Id_client  ) VALUES(0,:annee,:marque,:kilometrage,:modele,:immatriculation,:Id_client)");
        $req->execute(array('annee' => $voiture->get_annee(), ':marque' => $voiture->get_marque(), ':kilometrage' => $voiture->get_kilometrage(), ':modele' => $voiture->get_modele(), ':immatriculation' => $voiture->get_immatriculation(), ':annee' => $voiture->get_annee(), ':Id_client' => $voiture->get_id_client()));

        $msg_ins = "Ajout de la {$voiture->get_marque()} à {$voiture->get_modele()} .";
    }
    else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
}
