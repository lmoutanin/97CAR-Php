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
    <title>Ajout Facture</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">
        <form method="POST" action="mes-voiture.php">

            <h1>Ajout Facture</h1>
            <hr>

           

            <div class="name-field">

                <div>
                    <label for="annee"> Année Modèle</label>
                    <input type="date" id="annee" name="annee" min="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required />

                </div>

                <div>
                    <label for="annee">Email du proprietaire </label>
                    <input type="email" id="email" name="email" maxlength="50" size="30" placeholder="Votre email" required />

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