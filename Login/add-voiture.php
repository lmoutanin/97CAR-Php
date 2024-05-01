<?php
session_start();

require('verify/restricted-access.php');
require('menu.php');

require('verify/verify-add-voiture.php');

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Créer une  voiture à {$nom} {$prenom}" ?> </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">

        <form method="POST" action="">

            <h1><?php echo "Ajouter une voiture à {$nom} {$prenom}" ?> </h1>
            <hr>
            <div align="center">
                <?php echo "<strong>{$msg_ins} </strong>";  ?>
                <?php echo "<strong>{$error_msg} </strong>";  ?>
            </div>
            <br>

            <div class="name-field">

                <div class="groupe">
                    <label>Date</label>
                    <input type="date" id="annee" name="annee" min="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required />

                </div>

            </div>

            <div class="name-fields">

                <div>
                    <label for="marque"> Marque </label>
                    <input type="text" id="marque" name="marque" minlength="2" maxlength="100" size="30" placeholder="Votre marque" autocomplete="off" required />
                </div>

                <div class="imma">
                    <label for="imma">Immatriculation </label>
                    <label">

                        <input name="imma1" id="imma" type="text" pattern="[a-zA-Z0-9]{2}"   placeholder="XX" size="2" autocomplete="off" required />-
                        <input name="imma2" id="imma" type="text" pattern="[a-zA-Z0-9]{3}"   placeholder="XXX" size="3" autocomplete="off" required />-
                        <input name="imma3" id="imma" type="text" pattern="[a-zA-Z0-9]{2}"   placeholder="XX" size="2" autocomplete="off" required />

                        </label>
                </div>

            </div>

            <div class="name-fields">

                <div>
                    <label for="modele"> Modele </label>
                    <input type="text" id="modele" name="modele" minlength="2" maxlength="50" size="30" placeholder="Votre modele" autocomplete="off" required />
                </div>

                <div>
                    <label for="kilometrage"> Kilometrage </label>
                    <input type="number" id="kilometrage" name="kilometrage" pattern="[0-9]" placeholder="Votre kilometrage" size="30" autocomplete="off" required />
                </div>

            </div>

            <br>
            <div align="center">
                <button type="submit" class="bouton" name="ok">Ajout Voiture</button>
            </div>

        </form>

    </div>

    <br>

</body>

</html>