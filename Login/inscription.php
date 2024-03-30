

<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Création de compte</h1>
    <h2>VOS IDENTIFIANTS :</h2>
    <form action="client.php" method="post">

        <div>
            <label for="email" class="id"><i class="vid">*</i>Email :</label>
            <input id="email" name="email" size="50" placeholder="Votre email" required />
        </div>

        <div>
            <label for="mdp" class="id"><i class="vid">*</i>Mot de passe :</label>
            <input type="password" id="pass" name="mdp" minlength="8" size="50" placeholder="Votre mot de passe" required />


        </div>

        <h2>VOS INFORMATIONS PERSONNELLES :</h2>


        <div>
            <input type="radio" id="monsieur" name="civilite" value="monsieur" checked />
            <label for="monsieur">M.</label>
            <input type="radio" id="madame" name="civilite" value="madame" />
            <label for="madame">Mme</label>
        </div>

        <div>
            <label for="prenom" class="id"><i class="vid">*</i>Prénom :</label>
            <input type="text" id="prenom" name="prenom" required minlength="2" maxlength="50" size="50" placeholder="Votre prénom" required />
        </div>

        <div>
            <label for="nom" class="id"><i class="vid">*</i>Nom :</label>
            <input type="text" id="nom" name="nom" required minlength="2" maxlength="50" placeholder="Votre nom" size="50" required />
        </div>

        <div>
            <label for="adresse" class="id"><i class="vid">*</i>Adresse :</label>
            <input type="text" id="adresse" name="adresse" required minlength="2" maxlength="100" placeholder="Votre adresse" size="50" required />
        </div>

        <div>
            <label for="codePostal" class="id"><i class="vid">*</i>Code postal :</label>
            <input type="text" id="codePostal" name="codePostal" required pattern="[0-9]{5}" placeholder="Votre code postal" size="50" required />
        </div>

        <div>
            <label for="ville" class="id"><i class="vid">*</i>Ville :</label>
            <input type="text" id="ville" name="ville" required minlength="2" maxlength="50" placeholder="Votre ville" size="50" required />
        </div>

        <div>
            <label for="telephone" class="id"><i class="vid">*</i>Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" size="50" placeholder="Votre téléphone" required />
        </div>


        <br>

        <button type="submit" class="bouton" type="submit">Créez un compte</a></button>
    </form>
    <br>
    <br>


    
</body>

</html>