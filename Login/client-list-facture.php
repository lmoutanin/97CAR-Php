<?php
session_start();

require('verify/restricted-access.php');
require('menu.php');

require('class/Facture.php');
require('verify/bdd.php');

$id = $_SESSION['id-client'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

if ($id) {
    $req = $bdd->prepare("SELECT date_facture,marque,modele,descriptions,cout,quantite,voiture.Id_voiture FROM client INNER JOIN voiture ON client.Id_client = voiture.Id_client INNER JOIN facture ON voiture.Id_voiture = facture.Id_voiture INNER JOIN reparation ON facture.Id_facture = reparation.Id_reparation WHERE client.Id_client =:id");
    $req->execute(array('id' => $id));
    $fts = $req->fetchAll();
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Facture de ' . $nom . ' ' . $prenom;  ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">

        <h1 align="center"> <?php echo '  Facture de ' . $nom . ' ' . $prenom; ?> </h1>
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

                    $ft = new Facture($id, $ft['Id_voiture'], $ft['date_facture'], $ft['marque'], $ft['modele'], $ft['cout'], $ft['quantite'], $ft['descriptions']); ?>

                    <tr>
                        <td onclick="location.href='client-facture.php?<?php echo 'pp=' . $ft->get_id_client() . '&id=' . $ft->get_id_voiture() . '&dt=' . $ft->get_date(); ?>'"> <?php echo $ft->get_date(); ?> </td>

                        <td onclick="location.href='client-facture.php?<?php echo 'pp=' . $ft->get_id_client() . '&id=' . $ft->get_id_voiture() . '&dt=' . $ft->get_date(); ?>'"><?php echo $ft->get_marque(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'pp=' . $ft->get_id_client() . '&id=' . $ft->get_id_voiture() . '&dt=' . $ft->get_date(); ?>'"> <?php echo $ft->get_modele(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'pp=' . $ft->get_id_client() . '&id=' . $ft->get_id_voiture() . '&dt=' . $ft->get_date(); ?>'"> <?php echo $ft->get_description(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'pp=' . $ft->get_id_client() . '&id=' . $ft->get_id_voiture() . '&dt=' . $ft->get_date(); ?>'"><?php echo $ft->get_quantite(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'pp=' . $ft->get_id_client() . '&id=' . $ft->get_id_voiture() . '&dt=' . $ft->get_date(); ?>'"><?php echo $ft->get_cout(); ?> </td>
                        <td onclick="location.href='client-facture.php?<?php echo 'pp=' . $ft->get_id_client() . '&id=' . $ft->get_id_voiture() . '&dt=' . $ft->get_date(); ?>'"><?php echo $ft->total(); ?> </td>
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