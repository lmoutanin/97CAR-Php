<?php

session_start();
require('class/Client.php');
require('verify/restricted-access.php');
require('verify/menu.php');
nombre(1);

$email = $rep['mel'];
$mdp = $rep[''];
$civilite = $rep['civilite'];
$prenom = $rep['prenom'];
$nom = $rep['nom'];
$adresse = $rep['adresse'];
$codePostal = $rep['code_postal'];
$ville = $rep['ville'];
$telephone = $rep['telephone'];
$civilite = $rep['civilite'];

$client = new Client($email, $mdp, $civilite, $prenom, $nom, $adresse, $codePostal, $ville, $telephone);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes Informations </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <div class="formulaire">
        <form method="POST" action="">


            <h1>Informations <?php echo $client->get_nom() . " " . $client->get_prenom(); ?> </h1>
            <hr>
            <div class="name-field">

                <div>
                    <label for="civilite">Civilité</label>
                    <input type="text" id="civilite" size="70" readonly="true" name="civilite" placeholder="Votre Civilite" value="<?php echo $client->get_civilite(); ?>" required />
                </div>

            </div>
            <div class="name-field">

                <div>
                    <label for="nom">Nom </label>
                    <input type="text" id="nom" name="nom" minlength="2" maxlength="50" size="30" placeholder="Votre nom" readonly="true" value="<?php echo $client->get_nom(); ?>" required />
                </div>

                <div>
                    <label for="prenom"> Prénom </label>
                    <input type="text" id="prenom" name="prenom" minlength="2" maxlength="50" size="30" placeholder="Votre prénom" readonly="true" value="<?php echo $client->get_prenom(); ?>" required />
                </div>

            </div>

            <div class="name-field">

                <div>
                    <label for="adresse"> Adresse </label>
                    <input type="text" id="adresse" name="adresse" minlength="2" maxlength="100" size="30" placeholder="Votre adresse" value="<?php echo $client->get_adresse(); ?>" required />
                </div>

                <div>
                    <label for="codePostal"> Code postal </label>
                    <input type="text" id="codePostal" name="codePostal" pattern="[0-9]{5}" size="30" placeholder="Votre code postal" value="<?php echo $client->get_codePostal(); ?>" required />
                </div>

            </div>


            <div class="name-field">

                <div>
                    <label for="ville"> Ville </label>
                    <input type="text" id="ville" name="ville" minlength="2" maxlength="50" size="30" placeholder="Votre ville" value="<?php echo $client->get_ville(); ?>" required />
                </div>

                <div>
                    <label for="telephone"> Téléphone </label>
                    <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" size="30" placeholder="Votre téléphone" value="<?php echo  $client->get_telephone(); ?>" required />
                </div>

            </div>


            <div class="name-field">

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" size="30" name="email" placeholder="Votre email" value="<?php echo $client->get_email(); ?>" required />
                </div>

                <div>
                    <label for="mdp"> Mot de passe</label>
                    <input type="password" id="pass" size="30" name="mdp" minlength="8" placeholder="Votre mot de passe" required />
                </div>

            </div>
            <br>
            <div align="center">
                <button type="submit" class="bouton" name="ok"><strong>Modifier</strong></button>
            </div>
        </form>
    </div>
</body>

</html>