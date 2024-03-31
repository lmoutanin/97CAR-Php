<?php
require('bdd.php');
require('filtre_connexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <h1>IDENTIFIEZ-VOUS :</h1>

        <?php echo $error_msg; ?>

        <form method="POST" action="">

            <div class="container">
                <label class="id"> </label>
                <input id="email" name="email" size="50" placeholder="Votre email" required />
            </div>

            <div class="container">
                <label class="id"> </label>
                <input type="password" id="pass" name="mdp" minlength="8" size="50" placeholder="Votre mot de passe" required />
            </div>
            <br>
            <button class="bouton" type="submit" name="ok">CONNEXION</button>

        </form>

        <h2>NOUVEAU CLIENT ?</h2>
        <button class="bouton" type="submit"><a href="inscription.php">Créez un compte</a></button>
    </div>

</body>

</html>