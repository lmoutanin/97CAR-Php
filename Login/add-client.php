<?php 
session_start();

require('verify/verify-proprietaire.php');
require('menu.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajout Client</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="formulaire">
    <form method="POST" action="">

        <h1>Ajout Client</h1>
      
       <hr>
       <br>
       <div align="center">
       <?php echo "<strong>{$msg_ins} </strong>";  ?>
            <?php  echo "<strong>{$error_msg} </strong>";  ?>
        </div>
        <br>
        <div class="name-field" >

        
              
            <div>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" size="30" placeholder="Votre email"  autocomplete="off" required />

            </div>
            <div>
            </div>
 
        </div>
  
        <div class="name-field">

            <div>
                <label for="nom">Nom </label>
                <input type="text" id="nom" name="nom" minlength="2" maxlength="50" size="30" placeholder="Votre nom"  autocomplete="off" required />
            </div>

            <div>
                <label for="prenom"> Prénom </label>
                <input type="text" id="prenom" name="prenom" minlength="2" maxlength="50" size="30" placeholder="Votre prénom"  autocomplete="off" required />
            </div>

        </div>

        <div class="name-field">

            <div>
                <label for="adresse"> Adresse </label>
                <input type="text" id="adresse" name="adresse" minlength="2" maxlength="100" size="30" placeholder="Votre adresse"   autocomplete="off" required />
            </div>

            <div>
                <label for="codePostal"> Code postal </label>
                <input type="text" id="codePostal" name="codePostal" pattern="[0-9]{5}" size="30" placeholder="Votre code postal"   autocomplete="off" required />
            </div>

        </div>


        <div class="name-field">

            <div>
                <label for="ville"> Ville </label>
                <input type="text" id="ville" name="ville" minlength="2" maxlength="50" size="30" placeholder="Votre ville"  autocomplete="off" required />
            </div>

            <div>
                <label for="telephone"> Téléphone </label>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" size="30" placeholder="Votre téléphone"   autocomplete="off" required />
            </div>

        </div>
     <br>
      
        <div align="center">
            <button type="submit" class="bouton" name="ok">Crée un propriétaire </button>
        </div>
    </form>
    

    </div>
</body>

</html>