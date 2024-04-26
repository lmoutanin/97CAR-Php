<?php
session_start();

require('menu.php');
require('verify/bdd.php');
require('class/Client.php');
$id = $_SESSION['id-client'];
$id_voiture = $_GET['id'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];


$req = $bdd->prepare("SELECT * FROM client WHERE Id_client = :id");
$req->execute(array('id' => $id));
$repondre = $req->fetch();
$_SESSION['nom'] =  $repondre['nom'];
$_SESSION['prenom'] = $repondre['prenom'];

$client = new Client($repondre['mel'], $repondre['prenom'], $repondre['nom'], $repondre['adresse'], $repondre['code_postal'], $repondre['ville'], $repondre['telephone'], $repondre['Id_client']);

$req = $bdd->prepare(" SELECT nom, prenom, marque, modele,date_facture,descriptions,cout,quantite,Id_facture
FROM client 
INNER JOIN voiture ON client.Id_client = voiture.Id_client
INNER JOIN facture ON voiture.Id_voiture = facture.Id_voiture
INNER JOIN reparation ON facture.Id_facture = reparation.Id_reparation
WHERE client.Id_client = :id AND voiture.Id_voiture= :id_voiture");
$req->execute(array('id' => $id, 'id_voiture' => $id_voiture));
$repondres = $req->fetchAll();

$vsql = $bdd->prepare("SELECT * FROM voiture WHERE Id_voiture = :id");
$vsql->execute(array('id' => $id_voiture));
$vrep = $req->fetch();



?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>
    <link rel="stylesheet" href="css/facture.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire">



        <div class="logos">

            <img src="image/Logo_97CAR_White.png" alt=""><br>

            <strong>
                <h1>Facture </h1><br>
            </strong>

            </strong>
            <br><br>
            <h2 align="left">97 CAR</h2>
            <p>69 Rue des alamandas </p>
            <p>Saint-Benoît 97470, La Réunion </p>
            <p>97car@gmail.com</p>
            <p>0262 92 96 81</p>

        </div>

        <div class="client">
            <strong>

            </strong>
            <h3><?php echo   $nom . '   ' . $prenom; ?></h3>
            <p><?php echo $client->get_adresse(); ?> </p>
            <p><?php echo $client->get_ville() . ' , ' . $client->get_codePostal(); ?> </p>
            <p><?php echo $client->get_email(); ?> </p>
            <p><?php echo $client->get_telephone(); ?> </p>

        </div>



        <div>




        </div>





        <br><br><br><br><br>




        <table class="formul1">

            <thead>

                <tr>
                    <th>DESCRIPTION</th>
                    <th>QUANTITE</th>
                    <th>PRIX</th>

                    <th>MONTANT</th>


                </tr>

            </thead>

            <tbody>


                <?php foreach ($repondres as $repondre) {

                ?>


                    <tr>

                        <td> <?php echo $repondre['descriptions']; ?> </td>
                        <td> <?php echo $repondre['quantite']; ?> </td>
                        <td><?php echo $repondre['cout']; ?> </td>
                        <td><?php echo $repondre['quantite'] * $repondre['cout']; ?></td>



                    </tr>


                <?php $total = $total + $repondre['quantite'] * $repondre['cout'];
                } ?>



                <div class="table">
                    <tr>
                        <th colspan="3">TOTAL</th>
                        <th> <?php echo $total; ?></th>

                    </tr>
                </div>
        </table>

        </tbody>

    </div>
</body>

</html>