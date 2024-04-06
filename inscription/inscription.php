<?php require('filtre_inscription.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription  97CAR</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>

    <form method="POST" action="">

        <h1>INSCRIPTION</h1>
        <hr>

        <?php echo $error_msg ?>
        <p class="choose-email">Identifiants</p>

        <div class="inputs">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required />

            <label for="mdp"> Mot de passe</label>
            <input type="password" id="pass" name="mdp" minlength="8" placeholder="Votre mot de passe" required />
        </div>

        <hr>

        <p class="choose-email">Informations personnelles</p>
        <label for="">Civilité </label><br>
        <div class="name">

            <div class="radio">

                <input type="radio" id="monsieur" name="civilite" value="Monsieur" checked />
                <label for="Individual">Monsieur</label>
            </div>


            <div class="radio">

                <input type="radio" id="madame" name="civilite" value="Madame" />
                <label for="Professional">Madame</label>
            </div>
        </div>



        <div class="name-field">

            <div>
                <label for="nom">Nom </label>
                <input type="text" id="nom" name="nom" minlength="2" maxlength="50" size="30" placeholder="Votre nom" required />
            </div>

            <div>
                <label for="prenom"> Prénom </label>
                <input type="text" id="prenom" name="prenom" minlength="2" maxlength="50" size="30" placeholder="Votre prénom" required />
            </div>

        </div>

        <div class="name-field">

            <div>
                <label for="adresse"> Adresse </label>
                <input type="text" id="adresse" name="adresse" minlength="2" maxlength="100" size="30" placeholder="Votre adresse" required />
            </div>

            <div>
                <label for="codePostal"> Code postal :</label>
                <input type="text" id="codePostal" name="codePostal" pattern="[0-9]{5}" size="30" placeholder="Votre code postal" required />
            </div>

        </div>


        <div class="name-field">

            <div>
                <label for="ville"> Ville </label>
                <input type="text" id="ville" name="ville" minlength="2" maxlength="50" size="30" placeholder="Votre ville" required />
            </div>

            <div>
                <label for="telephone"> Téléphone </label>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" size="30" placeholder="Votre téléphone" required />
            </div>

        </div>
        <hr>
        <p class="inscription">Vous avez déjà un  <span>compte</span>?   <a href="../login/login.php"><span>Connectez-vous</span></a>  </p>
        <div align="center">
            <button type="submit" class="bouton" name="ok">Créez votre compte</a></button>
        </div>
    </form>
</body>