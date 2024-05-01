<?php
session_start();

$id = $_GET['fa'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

require('verify/bdd.php');
require('menu.php');
require('class/Client.php');

$req = $bdd->prepare("SELECT *
FROM facture_reparation 
INNER JOIN facture ON facture_reparation.Id_facture = facture.Id_facture 
INNER JOIN reparation ON facture_reparation.Id_reparation = reparation.Id_reparation 
INNER JOIN client ON facture.Id_client = client.Id_client
INNER JOIN voiture ON facture.Id_voiture = voiture.Id_voiture
WHERE facture_reparation.Id_facture =:id_facture");
$req->execute(array('id_facture' => $id));

$repondres = $req->fetchAll(); // Utiliser fetchAll() pour récupérer toutes les lignes de données

$client = new Client($repondres[0]['mel'], $repondres[0]['prenom'], $repondres[0]['nom'], $repondres[0]['adresse'], $repondres[0]['code_postal'], $repondres[0]['ville'], $repondres[0]['telephone'], $repondres[0]['Id_client']);

$total = 0; // Initialiser le total à zéro

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>
    <link rel="stylesheet" href="css/facture.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire">

        <div class="clients">
            <h2 align="center">97CAR</h2>
            <h3>Facture :<?php echo  $repondres[0]['Id_facture'];  ?></h3>

            <h4>Le :<?php echo $repondres[0]['date_facture'];     ?> </h4>

            <p>69 Rue des alamandas </p>
            <p>Saint-Benoît 97470, La Réunion </p>
            <p>97car@gmail.com</p>
            <p>0262 92 96 81</p>
        </div>

        <div class="client">
            <h3><?php echo   $nom . '   ' . $prenom; ?></h3>
            <p><?php echo $client->get_adresse(); ?> </p>
            <p><?php echo $client->get_ville() . ' , ' . $client->get_codePostal(); ?> </p>
            <p><?php echo $client->get_email(); ?> </p>
            <p><?php echo $client->get_telephone(); ?> </p>

        </div>

        <br><br><br><br><br>

        <table class="formul1">

            <thead>

                <tr>
                    <th>N°</th>
                    <th>DESCRIPTION</th>
                    <th>QUANTITE</th>
                    <th>PRIX</th>
                    <th>MONTANT</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($repondres as $repondre) { ?>
                    <tr>
                        <td><?php echo $numero = $numero + 1; ?></td>
                        <td> <?php echo $repondre['descriptions']; ?> </td>
                        <td> <?php echo $repondre['quantite']; ?> </td>
                        <td><?php echo $repondre['cout']; ?> </td>
                        <td><?php echo $repondre['quantite'] * $repondre['cout']; ?></td>
                    </tr>
                    <?php $total += $repondre['quantite'] * $repondre['cout']; // Ajouter le montant au total
                    ?>
                <?php } ?>

            </tbody>
            <br>

        </table>

        <div class="total">
            <h4><?php echo 'MONTANT TOTAL : ' . $total . ' €';; ?></h3>
        </div>

    </div>
</body>

</html>