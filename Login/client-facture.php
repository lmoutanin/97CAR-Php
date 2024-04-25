<?php
session_start();

 
require('verify/bdd.php');
require('menu.php');
$id=$_SESSION['id'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];

$id_client = $_SESSION['id-client'];
    $id_voiture = $_SESSION['id-voiture'];
 
 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo'Voiture de '. $nom.' '.$prenom;  ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">


        <h1>   <?php echo 'Liste des voitures de '.$nom.' '.$prenom; ?> </h1>
        <br>
 
        <table class="formul1">

            <thead>

                <tr>
                    <th>Description</th>
                    <th>Cout unitaire</th>
                    <th>Quantite</th>
                    <th>Montant</th>
                   

                </tr>

            </thead>

            <tbody>

                <?php 
                   

                    $requete = $bdd->query("SELECT * FROM facture WHERE  Id_client = $id_client AND Id_voiture = $id_voiture ");
                     
                    $requete->execute();

                ?>


                    <tr>
                        <td> <?php echo $repondres['date_client'] ?></td>
                     
                    </tr>




                   
              

            </tbody>



        </table>




    </div>


</body>

</html>