<?php


require('filter.php');



?>
<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Créez votre compte</h1>
    <h2>Identifiants</h2>
    <form action="inscription.php" method="post">

        <div>
            <label for="email" class="id"><i class="vid">*</i>Email :</label>
            <input id="email" name="email" size="50" required />
        </div>

        <div>
            <label for="mdp" class="id"><i class="vid">*</i>Mot de passe :</label>
            <input type="password" id="pass" name="mdp" minlength="8" size="50" required />


        </div>

        <h2>Informations personnelles</h2>

        <label for="civilite">Civilité :</label>
        <div>
            <input type="radio" id="monsieur" name="civilite" value="monsieur" checked />
            <label for="monsieur">Monsieur</label>
            <input type="radio" id="madame" name="civilite" value="madame" />
            <label for="madame">Madame</label>
        </div>

        <div>
            <label for="prenom" class="id"><i class="vid">*</i>Prénom :</label>
            <input type="text" id="prenom" name="prenom" required minlength="2" maxlength="50" size="50" />
        </div>

        <div>
            <label for="nom" class="id"><i class="vid">*</i>Nom :</label>
            <input type="text" id="nom" name="nom" required minlength="2" maxlength="50" size="50" />
        </div>

        <div>
            <label for="adresse" class="id"><i class="vid">*</i>Adresse :</label>
            <input type="text" id="adresse" name="adresse" required minlength="2" maxlength="100" size="50" />
        </div>

        <div>
            <label for="codePostal" class="id"><i class="vid">*</i>Code postal :</label>
            <input type="text" id="codePostal" name="codePostal" required pattern="[0-9]{5}" size="50" />
        </div>

        <div>
            <label for="ville" class="id"><i class="vid">*</i>Ville :</label>
            <input type="text" id="ville" name="ville" required minlength="2" maxlength="50" size="50" />
        </div>

        <div>
            <label for="telephone" class="id"><i class="vid">*</i>Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" size="50" required />
        </div>

        <input type="submit" value="Envoyer" />

    </form>
    <br>
    <br>
    <br>

    <?php inscription('email', 'mdp', 'civilite', 'prenom', 'nom', 'adresse', 'codePostal', 'ville', 'telephone'); ?>
</body>

</html>