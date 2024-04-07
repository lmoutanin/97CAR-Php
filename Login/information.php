<?php
require('client.php');
require('menu.php');
nombre(1);

$prenom = $rep['prenom'];
$nom = $rep['nom'];
$email = $rep['mel'];
$adresse = $rep['adresse'];
$codePostal = $rep['code_postal'];
$ville = $rep['ville'];
$telephone = $rep['telephone'];
$civilite = $rep['civilite'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informations personnelles</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>

    <form method="POST" action="">

        <h1>Informations personnelles</h1>
<hr>
        <div class="name-field">

            <div>
                <label for="civilite">Civilité</label>
                <input type="text" id="civilite" size="70" readonly="true" name="civilite" placeholder="Votre Civilite" value=" <?php echo $civilite; ?>" required />
            </div>

        </div>
        <div class="name-field">

            <div>
                <label for="nom">Nom </label>
                <input type="text" id="nom" name="nom" minlength="2" maxlength="50" size="30" placeholder="Votre nom" readonly="true" value=" <?php echo $nom; ?>" required />
            </div>

            <div>
                <label for="prenom"> Prénom </label>
                <input type="text" id="prenom" name="prenom" minlength="2" maxlength="50" size="30" placeholder="Votre prénom"  readonly="true" value=" <?php echo $prenom; ?>" required />
            </div>

        </div>

        <div class="name-field">

            <div>
                <label for="adresse"> Adresse </label>
                <input type="text" id="adresse" name="adresse" minlength="2" maxlength="100" size="30" placeholder="Votre adresse" value=" <?php echo  $adresse; ?>" required />
            </div>

            <div>
                <label for="codePostal"> Code postal </label>
                <input type="text" id="codePostal" name="codePostal" pattern="[0-9]{5}" size="30" placeholder="Votre code postal" value=" <?php echo $codePostal; ?>" required />
            </div>

        </div>


        <div class="name-field">

            <div>
                <label for="ville"> Ville </label>
                <input type="text" id="ville" name="ville" minlength="2" maxlength="50" size="30" placeholder="Votre ville" value=" <?php echo $ville; ?>" required />
            </div>

            <div>
                <label for="telephone"> Téléphone </label>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" size="30" placeholder="Votre téléphone" value=" <?php echo $telephone; ?>" required />
            </div>

        </div>


        <div class="name-field">

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" size="30" name="email" placeholder="Votre email" value=" <?php echo $email; ?>" required />
            </div>

            <div>
                <label for="mdp"> Mot de passe</label>
                <input type="password" id="pass" size="30" name="mdp" minlength="8" placeholder="Votre mot de passe" required />
            </div>

        </div>
<br>
        <div align="center">
            <button type="submit" class="bouton" name="ok">Créez votre compte</a></button>
        </div>
    </form>
</body>