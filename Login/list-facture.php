<?php
session_start();
require('verify/restricted-access.php');
require('menu.php');
 
 


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des factures</title>
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">
        

            <h1> Liste des factures </h1><br>

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

                    <?php foreach ($repondres as $repondre) {
                        $client = new Client($repondre['mel'], $repondre['prenom'], $repondre['nom'], $repondre['adresse'], $repondre['code_postal'], $repondre['ville'], $repondre['telephone'], $repondre['Id_client']);
                    ?>

                        <tr>
                      
                        
                         <td onclick="location.href='home-client.php?id=<?php echo $client->get_id_client(); ?>'">   <?php echo $client->get_nom(); ?></a> </td>
                         <td onclick="location.href='home-client.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_prenom(); ?></a> </td>
                         <td onclick="location.href='home-client.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_telephone(); ?></a> </td>
                         <td onclick="location.href='home-client.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_email(); ?></a> </td>
                         <td onclick="location.href='home-client.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_ville(); ?></a></td>
                         <td onclick="location.href='home-client.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_adresse(); ?></a></td>
                         <td onclick="location.href='home-client.php?id=<?php echo $client->get_id_client(); ?>'">  <?php echo $client->get_codePostal(); ?></a> </td>
                        </tr>
                    <?php  } ?>

                </tbody>



            </table>






        


    </div>


</body>

</html>