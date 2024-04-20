<?php

require('verify/restricted-access.php');
require('menu.php');
$id = $_GET['id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu-proprietaire </title>
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<div class="formulaire">
  
    <div class="card-container">

        <div class="card">
            <img src="image/utilisateur.png">
            <div class="card-content">
                <h3>Ajout Client</h3>
             
                <a href="add-proprietaire.php" class="btn">consulter</a>
            </div>
        </div>

        <div class="card">
            <img src="image/personne.png">
            <div class="card-content">
                <h3> Client</h3>
                 
                <a href="proprietaire.php" class="btn">consulter</a>
            </div>
        </div>

        <div class="card">
            <img src="image/panneau-de-signalisation.png">
            <div class="card-content">
                <h3> Voiture</h3>
                
                <a href="voiture.php" class="btn">consulter</a>
            </div>
        </div>
         

            <div class="card">
                <img src="image/facture-dachat.png">
                <div class="card-content">
                    <h3> Facture</h3>
                   
                    <a href="facture.php" class="btn">consulter</a>
                </div>
            </div>


        </div>
        </div>









</body>

</html>