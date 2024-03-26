<?php require('filter.php'); ?>
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
    <form action="connexion.php" method="post">
  
        <div>
            <label for="email" class="id">Email :</label>
            <input   id="email" name="email"   />
        </div>

        <div>
            <label for="password" class="id">Mot de passe :</label>
            <input type="password" id="pass" name="password" minlength="8" required />
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
            <label for="prenom" class="id">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required minlength="2" maxlength="50" size="30" />
        </div>

        <div>
            <label for="nom" class="id">Nom :</label>
            <input type="text" id="nom" name="nom" required minlength="2" maxlength="50" size="30" />
        </div>

        <div>
            <label for="adresse" class="id">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required minlength="2" maxlength="100" size="50" />
        </div>

        <div>
            <label for="codePostal" class="id">Code postal :</label>
            <input type="text" id="codePostal" name="codePostal" required pattern="[0-9]{5}" />
        </div>

        <div>
            <label for="ville" class="id">Ville :</label>
            <input type="text" id="ville" name="ville" required minlength="2" maxlength="50" size="30" />
        </div>

        <div>
            <label for="telephone" class="id">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" required />
        </div>

        <input type="submit" value="Envoyer" />

    </form>
</body>
</html>
