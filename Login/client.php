<?php
session_start();
require('verify/restricted-access.php');
require('class/Client.php');
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
        

            <h1> Liste des propriétaires </h1><br>

            <table class="formul1">

                <thead>


                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRÉNOM</th>
                    <th>TÉLÉPHONE</th>
                    <th>EMAIL</th>
                    <th>VILLE</th>
                    <th>ADRESSE</th>
                    <th>CODE POSTAL</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($rps as $repondre) {
                        $client = new Client($repondre['mel'], $repondre['prenom'], $repondre['nom'], $repondre['adresse'], $repondre['code_postal'], $repondre['ville'], $repondre['telephone'], $repondre['Id_client']);
                    ?>

                        <tr>
                      
                        <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">   <?php echo $client->get_id_client(); ?></a> </td>
                         <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">   <?php echo $client->get_nom(); ?></a> </td>
                         <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_prenom(); ?></a> </td>
                         <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_telephone(); ?></a> </td>
                         <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_email(); ?></a> </td>
                         <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_ville(); ?></a></td>
                         <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_adresse(); ?></a></td>
                         <td onclick="location.href='menu-proprietaire.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_codePostal(); ?></a> </td>
                        </tr>
                    <?php  } ?>

                </tbody>



            </table>






        


    </div>


</body>

</html>