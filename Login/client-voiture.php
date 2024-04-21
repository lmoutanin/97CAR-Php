<?php
session_start();
require('class/Voiture.php');
require('verify/bdd.php');
require('menu.php');
$id=$_SESSION['id'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
 
if($id){
    $req = $bdd->prepare("SELECT * FROM voiture WHERE Id_client = :id");
    $req->execute(array('id' => $id ));
    $repondres = $req->fetchAll();
     
    
    }
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


        <h1>   <?php echo 'Liste des Voitures de '.$nom.' '.$prenom; ?> </h1>
        <br>
 
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
                    <td>  <?php echo  $voiture->get_id_client(); ?> </td>

                    <td>   <?php echo $voiture->get_id_voiture(); ?></td>
                    <td>     <?php echo $voiture->get_marque(); ?></td>
                    <td>    <?php echo $voiture->get_modele(); ?></td>

                    <td>    <?php echo $voiture->get_annee(); ?></td>
                    <td>   <?php echo $voiture->get_kilometrage(); ?></td>
                    <td>    <?php echo $voiture->get_immatriculation(); ?></td>



                    </tr>
                <?php  } ?>

            </tbody>



        </table>




    </div>


</body>

</html>