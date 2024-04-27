<?php
require('bdd.php');


$id = $_SESSION['id-client'];
$id_voiture = $_SESSION['id-voiture'];

if ($id) {
    $req = $bdd->prepare("SELECT * FROM client WHERE Id_client = :id");
    $req->execute(array('id' => $id));
    $repondre = $req->fetch();




    $req = $bdd->prepare(" SELECT nom, prenom, marque, modele,date_facture,descriptions,cout,quantite,Id_facture
    FROM client 
    INNER JOIN voiture ON client.Id_client = voiture.Id_client
    INNER JOIN facture ON voiture.Id_voiture = facture.Id_voiture
    INNER JOIN reparation ON facture.Id_facture = reparation.Id_reparation
    WHERE client.Id_client = :id AND voiture.Id_voiture= :id_voiture");
    $req->execute(array('id' => $id, 'id_voiture' => $id_voiture));
    $repondres = $req->fetchAll();


 $facture=$bdd->prepare("SELECT   marque, modele,date_facture,  Id_facture
 FROM client 
 INNER JOIN voiture ON client.Id_client = voiture.Id_client
 INNER JOIN facture ON voiture.Id_voiture = facture.Id_voiture
 INNER JOIN reparation ON facture.Id_facture = reparation.Id_reparation
 WHERE client.Id_client = :id AND voiture.Id_voiture= :id_voiture;");
    $facture->execute(array('id' => $id , 'id_voiture'=>$id_voiture));
    $factures=$facture->fetch();

}
