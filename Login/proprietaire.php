<?php
session_start();
require('class/Client.php');
require('verify/verify-voiture.php');
require('verify/restricted-access.php');
require('verify/menu.php');
nombre(5);

 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Voitures</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <div class="formulaire ">
        <form method="POST" action="mes-voiture.php">

            <h1>   Liste des Voiture   </h1>
           

            <table  class="formul1"  >

<thead>

    <tr>

        <th>MARQUE</th>
        <th>MODÉLE</th>
        <th>ANNÉE</th>
        <th>KILOMETRATE</th>
        <th>IMMATRICULATION</th>

    </tr>

</thead>





<tbody>

<?php foreach ($repondres as $repondre) {
        echo ' 

<tr>

<td> ' . $repondre['marque'] . ' </td>
<td> ' . $repondre['modele'] . ' </td>
<td> ' . $repondre['annee'] . ' </td>
<td> ' . $repondre['kilometrage'] . ' </td>
<td> ' . $repondre['immatriculation'] . ' </td>

</tr>';
    }
    ?>
    

</tbody>



</table>
 
             
             

             

        </form>
         

    </div>
 

</body>

</html>