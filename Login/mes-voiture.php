<?php
session_start();
require('verify/restricted-access.php');
require('verify/menu.php');
nombre(2);

$id = $_SESSION['id'];
$requete = $bdd->prepare("SELECT * FROM voiture WHERE Id_client = :Id_client");
$requete->execute(array(':Id_client' =>$id));
$repondres = $requete->fetchAll();
 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Voitures</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <div class="formulaire ">


        <table>

            <?php foreach ($repondres as $repondre) {
                echo '
        <tr>
            <th>MARQUE</th>
            <th>MODÉLE</th>
            <th>ANNÉE</th>
            <th>KILOMETRATE</th>
            <th>IMMATRICULATION</th>
            
        </tr>
        <tr>
            <td> '.$repondre['marque'].' </td>
            <td> '.$repondre['modele'].' </td>
            <td> '.$repondre['annee'].' </td>
            <td> '.$repondre['kilometrage'].' </td>
            <td> '.$repondre['immatriculation'].' </td>
            
             
        </tr>';
            }
            ?>
        </table>





    </div>




</body>

</html>