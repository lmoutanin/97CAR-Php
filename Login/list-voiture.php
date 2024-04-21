<?php
session_start();
require('class/Voiture.php');
require('verify/restricted-access.php');
require('menu.php');
 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des voitures </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">


        <h1> Liste des voitures </h1><br>
 
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
                        <td onclick="location.href='home-client.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo  $voiture->get_id_client(); ?> </td>

                        <td onclick="location.href='home-client.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_id_voiture(); ?></td>
                        <td onclick="location.href='home-client.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_marque(); ?></td>
                        <td onclick="location.href='home-client.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_modele(); ?></td>

                        <td onclick="location.href='home-client.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_annee(); ?></td>
                        <td onclick="location.href='home-client.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_kilometrage(); ?></td>
                        <td onclick="location.href='home-client.php?id=<?php echo $voiture->get_id_client(); ?>'"> <?php echo $voiture->get_immatriculation(); ?></td>



                    </tr>
                <?php  } ?>

            </tbody>



        </table>




    </div>


</body>

</html>