<?php
session_start();

require 'verify/restricted-access.php';
require 'menu.php';

require 'class/Facture.php';
require 'verify/bdd.php';

// Check if the client ID is set in the session
if (isset($_SESSION['id-client'])) {
    // Retrieve client information from the session
    $id = $_SESSION['id-client'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    // Initialize total variable
    $total = 0;

    // Prepare and execute SQL query to retrieve facture IDs for the client
    $stmt = $bdd->prepare("SELECT Id_facture FROM client INNER JOIN facture ON client.Id_client = facture.Id_client WHERE client.Id_client = :id");
    $stmt->execute(['id' => $id]);
    $factureIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Fetch facture details for each facture ID
    $fts = [];
    foreach ($factureIds as $factureId) {
        $stmt = $bdd->prepare("SELECT * FROM facture_reparation INNER JOIN facture ON facture_reparation.Id_facture = facture.Id_facture INNER JOIN voiture ON facture.Id_voiture = voiture.Id_voiture INNER JOIN reparation ON facture_reparation.Id_reparation = reparation.Id_reparation WHERE facture_reparation.Id_facture = :id");
        $stmt->execute(['id' => $factureId]);
        $fts = array_merge($fts, $stmt->fetchAll());
    }
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Facture de ' . $nom . ' ' . $prenom; ?></title>
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
                    // Instantiate Facture object
                    $facture = new Facture($ft['Id_facture'], $ft['Id_voiture'], $ft['date_facture'], $ft['marque'], $ft['modele'], $ft['cout'], $ft['quantite'], $ft['descriptions']);
                ?>
                    <tr>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $facture->get_id_client(); ?>'"><?php echo $facture->get_date(); ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $facture->get_id_client(); ?>'"><?php echo $facture->get_marque(); ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $facture->get_id_client(); ?>'"><?php echo $facture->get_modele(); ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $facture->get_id_client(); ?>'"><?php echo $facture->get_description(); ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $facture->get_id_client(); ?>'"><?php echo $facture->get_quantite(); ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $facture->get_id_client(); ?>'"><?php echo $facture->get_cout(); ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $facture->get_id_client(); ?>'"><?php echo $facture->total(); ?></td>
                        <?php $total += $facture->total(); ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="client">
            <h4><?php echo 'MONTANT TOTAL : ' . $total . ' €'; ?></h4>
        </div>
    </div>
</body>

</html>