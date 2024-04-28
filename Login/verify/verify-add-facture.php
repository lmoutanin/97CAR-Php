<?php
session_start();
require('bdd.php');
require('class/Facture.php');

$msg_ins = "";
$error_msg = "";

// Vérifier si on a bien appuyé sur le bouton ok 
if (isset($_POST['ok'])) {

    $id_client = $_SESSION['id-client'];
    $id_voiture = $_POST['voiture'];
    $date = $_POST['date'];

    $description1 = $_POST['description1'];
    $description2 = htmlspecialchars($_POST['description2'], ENT_QUOTES, 'UTF-8');
    $description3 = htmlspecialchars($_POST['description3'], ENT_QUOTES, 'UTF-8');
    $description4 = htmlspecialchars($_POST['description4'], ENT_QUOTES, 'UTF-8');
    $description5 = htmlspecialchars($_POST['description5'], ENT_QUOTES, 'UTF-8');

    echo var_dump($description1);

    // Vérifier si les champs requis sont remplis
    if (!empty($id_voiture) && !empty($date) && !empty($description1)) {

        $langages = array($description1, $description2, $description3, $description4, $description5);

        foreach ($langages as $langage) {


            $facture = new Facture($id_client, $id_voiture, $date, 0, 0, 0, 0, $repondre['Id_reparation']);

            $requete = $bdd->prepare("INSERT INTO facture (date_facture,Id_client,Id_voiture) VALUES (?,?,?)");
            $requete->bindParam(1, $facture->get_date());
            $requete->bindParam(2, $facture->get_id_client());
            $requete->bindParam(3, $facture->get_id_voiture());
            $requete->execute();
            $id_facture = $bdd->lastInsertId();

            $requete = $bdd->prepare("INSERT INTO facture_reparation (Id_facture,Id_reparation) VALUES (?,?)");
            $requete->bindParam(1,  $id_facture);
            $requete->bindParam(2, $langage);
            $requete->execute();
        }
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
}
