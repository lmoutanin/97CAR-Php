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
    <title>Créer Facture</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">
        <form method="POST" action="mes-voiture.php">

            <h1>Créer une Facture</h1>
            <hr>

           

            <div class="name-field">

                <div>
                    <label for="annee"> Année Modèle</label>
                    <input type="date" id="annee" name="annee" min="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required />

                </div>


  

            </div>
 

            <div align="center">
            <button type="submit" class="bouton" name="ok">Crée une facture </button>
            </div>

        </form>
        <div align="center">
            <?php echo $msg_ins;  ?>
            <?php echo $error_msg ?>
        </div>

    </div>


    <br>
    
 


</body>

</html>