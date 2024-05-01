<?php
session_start();

require('verify/restricted-access.php');
require('menu.php');

require('class/Facture.php');
require('verify/bdd.php');

$token = $_SESSION['token'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

if ($token) {
    $req = $bdd->prepare("SELECT facture.Id_facture,facture.date_facture,voiture.marque,voiture.modele,reparation.descriptions,reparation.cout,reparation.quantite,client.nom,client.prenom
    FROM facture_reparation 
    INNER JOIN facture ON facture_reparation.Id_facture = facture.Id_facture
    INNER JOIN reparation  ON facture_reparation.Id_reparation = reparation.Id_reparation
    INNER JOIN voiture ON facture.Id_voiture = voiture.Id_voiture
    INNER JOIN client ON facture.Id_client = client.Id_client  
	ORDER BY `facture`.`date_facture` DESC");
    $req->execute();
    $fts = $req->fetchAll();
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture Client</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">

        <h1 align="center">Facture Client </h1>
        <br>

        <table class="formul1">

            <thead>

                <tr>
                    <th>DATE</th>
                    <th>MARQUE</th>
                    <th>MODELE</th>
                    <th>DESCRIPTION</th>
                    <th>QUANTITE</th>
                    <th>COUT</th>
                    <th>MONTANT</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($fts as $ft) {

                    $ft = new Facture($ft['Id_facture'], $ft['Id_voiture'], $ft['date_facture'], $ft['marque'], $ft['modele'], $ft['cout'], $ft['quantite'], $ft['descriptions']);

                ?>

                    <tr>

                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft->get_id_client(); ?>'"> <?php echo $ft->get_date(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft->get_id_client(); ?>'"> <?php echo $ft->get_marque(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft->get_id_client(); ?>'"> <?php echo $ft->get_modele(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft->get_id_client(); ?>'"> <?php echo $ft->get_description(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft->get_id_client(); ?>'"> <?php echo $ft->get_quantite(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft->get_id_client(); ?>'"> <?php echo $ft->get_cout(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft->get_id_client(); ?>'"> <?php echo $ft->total(); ?> </td>

                        <?php $total = $total + $ft->total(); ?>
                    </tr>


                <?php  } ?>

            </tbody>

        </table>
        <div class="client">
            <h4><?php echo 'MONTANT TOTAL : ' . $total . ' €'; ?></h3>
        </div>



    </div>

</body>

</html>