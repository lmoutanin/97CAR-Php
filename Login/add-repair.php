<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

require('verify/restricted-access.php');
require('verify/verify-add-repair.php');
require('menu.php');

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Réparation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="formulaire ">

    <form method="POST" action="">

        <h1>Créer une Réparation</h1>
        <hr>
        <div align="center">
            <?php echo $msg_ins;  ?>
            <?php echo $error_msg ?>
        </div>

        <div class="separation"></div>
        <div class="corps-formulaire">
            <div class="gauche">

                <div class="groupe">
                    <label>Coût</label>
                    <input type="number" id="cout" name="cout" placeholder="Coût unitaire" size="30" autocomplete="off" required />

                </div>
                <div class="groupe">
                    <label>Quantité</label>
                    <input type="number" id="quantite" name="quantite" placeholder="Quantite" size="30" autocomplete="off" required />

                </div>

            </div>

            <div class="droite">
                <div class="groupe">
                    <label>Description</label>
                    <textarea type="text" id="description" name="description" placeholder="Saisissez ici..."></textarea>

                </div>
            </div>
        </div>

        <div class="pied-formulaire" align="center">
            <button type="submit" class="bouton" name="ok">Réparer </button>
        </div>


    </form>

</div>

</body>

</html>