<?php
session_start();
require('class/Voiture.php');
require('verify/restricted-access.php');
require('menu.php');
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Voitures</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <div class="formulaire ">


        <h1> Liste des Voiture </h1>
 
        <table class="formul1">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>ID VOITURE</th>
                    <th>MARQUE</th>
                    <th>MODÉLE</th>
                    <th>ANNÉE</th>
                    <th>KILOMETRATE</th>
                    <th>IMMATRICULATION</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($repondres as $repondre) {
                    $voiture  = new Voiture($repondre['marque'], $repondre['immatriculation'], $repondre['modele'], $repondre['kilometrage'], $repondre['annee'], $repondre['Id_client'], $repondre['Id_voiture']);

                ?>


                    <tr>
                        <td onclick="location.href='proprietaire/menu-proprietaire.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo  $voiture->get_id_client(); ?> </td>

                        <td onclick="location.href='proprietaire/menu-proprietaire.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_id_voiture(); ?></td>
                        <td onclick="location.href='proprietaire/menu-proprietaire.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_marque(); ?></td>
                        <td onclick="location.href='proprietaire/menu-proprietaire.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_modele(); ?></td>

                        <td onclick="location.href='proprietaire/menu-proprietaire.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_annee(); ?></td>
                        <td onclick="location.href='proprietaire/menu-proprietaire.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_kilometrage(); ?></td>
                        <td onclick="location.href='proprietaire/menu-proprietaire.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_immatriculation(); ?></td>



                    </tr>
                <?php  } ?>

            </tbody>



        </table>




    </div>


</body>

</html>