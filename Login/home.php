<?php
session_start();
require('verify/restricted-access.php');
require('menu.php');

$id = $_GET['id'];

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/card.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="formul">

        <div class="card-container">

            <div class="card">
                <img src="image/utilisateur(2).png">
                <div class="card-content">
                    <h3 align="center">+ Client</h3>

                    <a href="add-client.php" class="btn">consulter</a>
                </div>
            </div>


            <div class="card">
                <img src="image/carnet-dadresses.png">
                <div class="card-content">
                    <h3 align="center"> Client</h3>

                    <a href="list-client.php" class="btn">consulter</a>
                </div>
            </div>

            <div class="card">
                <img src="image/auto(1).png">
                <div class="card-content">
                    <h3 align="center"> Voiture</h3>

                    <a href="list-voiture.php" class="btn">consulter</a>
                </div>
            </div>


            <div class="card">
                <img src="image/facture-dachat(1).png">
                <div class="card-content">
                    <h3 align="center"> Facture</h3>

                    <a href="list-facture.php" class="btn">consulter</a>
                </div>
            </div>
            <div class="card">
                <img src="image/entretien.png">
                <div class="card-content">
                    <h3 align="center">Réparation</h3>

                    <a href="list-repair.php" class="btn">consulter</a>
                </div>
            </div>


        </div>
    </div>

</body>

</html>