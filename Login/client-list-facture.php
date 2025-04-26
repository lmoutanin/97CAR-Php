<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

require 'verify/restricted-access.php';
require 'menu.php';

require 'class/Facture.php';
require 'verify/bdd.php';


if (isset($_SESSION['id-client'])) {

    $id = $_SESSION['id-client'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];


    $total = 0;


    $stmt = $bdd->prepare("SELECT Id_facture FROM client INNER JOIN facture ON client.Id_client = facture.Id_client WHERE client.Id_client = :id");
    $stmt->execute(['id' => $id]);
    $factureIds = $stmt->fetchAll(PDO::FETCH_COLUMN);


    $fts = [];
    foreach ($factureIds as $factureId) {
        $stmt = $bdd->prepare(" SELECT facture_reparation.Id_facture,date_facture,marque,modele,sum(cout*quantite) as total FROM facture_reparation INNER JOIN facture ON facture_reparation.Id_facture = facture.Id_facture INNER JOIN voiture ON facture.Id_voiture = voiture.Id_voiture INNER JOIN reparation ON facture_reparation.Id_reparation = reparation.Id_reparation WHERE facture_reparation.Id_facture = :id ");
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
                    <th>MONTANT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($fts as $ft) {
                    // Instantiate Facture object

                ?>
                    <tr>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft[0]; ?>'"><?php echo $ft[1]; ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft[0]; ?>'"><?php echo $ft[2]; ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft[0]; ?>'"><?php echo $ft[3]; ?></td>
                        <td onclick="location.href='client-facture.php?<?php echo 'fa=' . $ft[0]; ?>'"><?php echo $ft[4]; ?></td>

                    </tr>
                <?php $total += $ft[4];
                } ?>
            </tbody>
        </table>
        <div class="client">
            <h4><?php echo 'MONTANT TOTAL : ' . $total . ' €'; ?></h4>
        </div>
    </div>
</body>

</html>