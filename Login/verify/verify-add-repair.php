<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require('bdd.php');
require('class/Repair.php');
require('verify/restricted-access.php');

$msg_ins = "";
$error_msg = "";

if (isset($_POST['ok'])) {
    $cout = $_POST['cout'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];

    if (!empty($cout) && !empty($description)) {
        $repair = new Repair($cout, $quantite, $description, 0);

        $description = $repair->get_description();
        $cout = $repair->get_cout();
        $quantite = $repair->get_quantite();

        $check = $bdd->prepare("SELECT COUNT(*) FROM reparation WHERE descriptions = ? AND cout = ?");
        $check->execute([$description, $cout]);

        if ($check->fetchColumn() == 0) {
            $requete = $bdd->prepare("INSERT INTO reparation (descriptions, cout, quantite) VALUES (?, ?, ?)");
            $requete->bindParam(1, $description);
            $requete->bindParam(2, $cout);
            $requete->bindParam(3, $quantite);

            if ($requete->execute()) {
                $msg_ins = "Ajout de la réparation.";
            } else {
                $error_msg = "Erreur : Impossible d'exécuter la requête.";
            }
        } else {
            $error_msg = "Cette réparation existe déjà.";
        }
    } else {
        $error_msg = "Merci de remplir les champs qui manquent.";
    }
}
