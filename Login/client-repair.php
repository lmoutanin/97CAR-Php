<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
        $stmt = $bdd->prepare(
            "SELECT 
                facture.Id_facture,
                facture.date_facture,
                voiture.Id_voiture,
                voiture.marque,
                voiture.modele,
                reparation.descriptions,
                reparation.cout,
                reparation.quantite
            FROM facture_reparation
            INNER JOIN facture ON facture_reparation.Id_facture = facture.Id_facture
            INNER JOIN voiture ON facture.Id_voiture = voiture.Id_voiture
            INNER JOIN reparation ON facture_reparation.Id_reparation = reparation.Id_reparation
            WHERE facture_reparation.Id_facture = :id"
        );
        $stmt->execute(['id' => $factureId]);
        $fts = array_merge($fts, $stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Réparation de ' . $nom . ' ' . $prenom; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">
        <h1 align="center"><?php echo 'Réparation de ' . $nom . ' ' . $prenom; ?></h1>
        <br>
        <table class="formul1">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>MARQUE</th>
                    <th>MODELE</th>
                    <th>DESCRIPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fts as $ft) {
                    $facture = new Facture(
                        $id,
                        isset($ft['Id_voiture']) ? $ft['Id_voiture'] : null,
                        isset($ft['date_facture']) ? $ft['date_facture'] : null,
                        isset($ft['marque']) ? $ft['marque'] : 'Non spécifié',
                        isset($ft['modele']) ? $ft['modele'] : 'Non spécifié',
                        isset($ft['cout']) ? $ft['cout'] : 0,
                        isset($ft['quantite']) ? $ft['quantite'] : 0,
                        isset($ft['descriptions']) ? $ft['descriptions'] : 'Non spécifié'
                    );
                ?>
                    <tr onclick="location.href='client-facture.php?pp=<?php echo $facture->get_id_client(); ?>&id=<?php echo $facture->get_id_voiture(); ?>&dt=<?php echo $facture->get_date(); ?>'">
                        <td><?php echo $facture->get_date(); ?></td>
                        <td><?php echo $facture->get_marque(); ?></td>
                        <td><?php echo $facture->get_modele(); ?></td>
                        <td><?php echo $facture->get_description(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>