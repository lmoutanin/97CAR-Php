<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require('bdd.php');
require('class/Facture.php');

$msg_ins = "";
$error_msg = "";

// Vérifier si on a bien appuyé sur le bouton ok 
if (isset($_POST['ok'])) {

    $id_client = $_SESSION['id-client'];
    $id_voiture = $_POST['voiture'];
    $date = $_POST['date'];

    $description1 = !empty($_POST['description1']) ? $_POST['description1'] : null;
    $description2 = !empty($_POST['description2']) ? htmlspecialchars($_POST['description2'], ENT_QUOTES, 'UTF-8') : null;
    $description3 = !empty($_POST['description3']) ? htmlspecialchars($_POST['description3'], ENT_QUOTES, 'UTF-8') : null;
    $description4 = !empty($_POST['description4']) ? htmlspecialchars($_POST['description4'], ENT_QUOTES, 'UTF-8') : null;
    $description5 = !empty($_POST['description5']) ? htmlspecialchars($_POST['description5'], ENT_QUOTES, 'UTF-8') : null;

    // Vérifier si les champs requis sont remplis
    if (!empty($id_voiture) && !empty($date) && !empty($description1)) {

        // Création d'un tableau contenant uniquement les descriptions non vides
        $langages = array();
        if (!empty($description1)) $langages[] = $description1;
        if (!empty($description2)) $langages[] = $description2;
        if (!empty($description3)) $langages[] = $description3;
        if (!empty($description4)) $langages[] = $description4;
        if (!empty($description5)) $langages[] = $description5;

        // Suppression de la référence à $repondre qui n'existe pas
        $facture = new Facture($id_client, $id_voiture, $date, 0, 0, 0, 0, null);

        $requete = $bdd->prepare("INSERT INTO facture (date_facture, Id_client, Id_voiture) VALUES (?, ?, ?)");
        // Création de variables temporaires pour le binding par référence
        $date_facture = $facture->get_date();
        $id_client_facture = $facture->get_id_client();
        $id_voiture_facture = $facture->get_id_voiture();

        $requete->bindParam(1, $date_facture);
        $requete->bindParam(2, $id_client_facture);
        $requete->bindParam(3, $id_voiture_facture);
        $requete->execute();
        $id_facture = $bdd->lastInsertId();

        // Insertion des réparations associées à la facture
        foreach ($langages as $langage) {
            if (!empty($langage)) {
                $requete = $bdd->prepare("INSERT INTO facture_reparation (Id_facture, Id_reparation) VALUES (?, ?)");
                // Création de variables temporaires pour le binding par référence
                $id_facture_temp = $id_facture;
                $id_reparation = $langage;

                $requete->bindParam(1, $id_facture_temp);
                $requete->bindParam(2, $id_reparation);
                $requete->execute();
            }
        }

        // Message de succès
        $msg_ins = "La facture a été ajoutée avec succès.";
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
}
