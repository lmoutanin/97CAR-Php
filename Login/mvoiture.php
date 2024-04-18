<?php
session_start();
require('class/Voiture.php');
require('verify/verify-voiture.php');
require('verify/restricted-access.php');
require('verify/menu.php');
nombre(2);

 

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
        <form method="POST" action="mes-voiture.php">

            <h1>AJOUTER UNE VOITURE </h1>
            <hr>

           

            <div class="name-field">

                <div>
                    <label for="annee"> Année Modèle</label>
                    <input type="date" id="start" name="annee" min="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required />

                </div>

            </div>

            <div class="name-field">

                <div>
                    <label for="marque"> Marque </label>
                    <input type="text" id="marque" name="marque" minlength="2" maxlength="100" size="30" placeholder="Votre marque" required />
                </div>

                <div class="imma">
                    <label for="imma">Immatriculation </label>
                    <label">

                        <input name="imma1" id="imma" type="text" pattern="[a-zA-Z0-9]{2}"   placeholder="XX" size="2" required />-
                        <input name="imma2" id="imma" type="text" pattern="[a-zA-Z0-9]{3}"   placeholder="XXX" size="3" required />-
                        <input name="imma3" id="imma" type="text" pattern="[a-zA-Z0-9]{2}"   placeholder="XX" size="2" required />

                        </label>
                </div>

            </div>

            <div class="name-field">

                <div>
                    <label for="modele"> Modele </label>
                    <input type="text" id="modele" name="modele" minlength="2" maxlength="50" size="30" placeholder="Votre modele" required />
                </div>

                <div>
                    <label for="kilometrage"> Kilometrage </label>
                    <input type="tel" id="kilometrage" name="kilometrage"  pattern="[0-9]{6}" placeholder="Votre kilometrage" size="30" required />
                </div>

            </div>
            </br>

            <div align="center">
                <button type="submit" class="bouton" name="ok"><strong>Enregistre</strong>  </button>
            </div>

        </form>
        <div align="center">
            <?php echo $msg_ins;  ?>
            <?php echo $error_msg ?>
        </div>

    </div>


    <br>
    

<div class="formul">  
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
    


</body>

</html>