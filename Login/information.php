<?php 
require('client.php');

$prenom=$rep['prenom'];
$nom==$rep['nom'];
$email=$rep['mel'];
$password=$rep['mdp'];
$adresse=$rep['adresse'];
$codePostal=$rep[''];
$ville=$rep[''];
$telephone=$rep[''];


?>
  

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>

 
  

    <form method="POST" action="">
 

        <h2>VOS INFORMATIONS PERSONNELLES :</h2>


        

        <div>
            <label for="prenom" class="id"><i class="vid">*</i>Prénom :</label>
            <input type="text" id="prenom" name="prenom" required minlength="2"  readonly="True" maxlength="50" size="50" placeholder="Votre prénom"  value="<?php echo $prenom; ?>"required />
        </div>

        <div>
            <label for="nom" class="id"><i class="vid">*</i>Nom :</label>
            <input type="text" id="nom" name="nom" required minlength="2" readonly="True" maxlength="50" placeholder="Votre nom" size="50" required />
        </div>


        <div>
            <label for="email" class="id"><i class="vid">*</i>Email :</label>
            <input type="email" id="email" name="email" size="50" placeholder="Votre email" required />
        </div>

        <div>
            <label for="mdp" class="id"><i class="vid">*</i>Mot de passe :</label>
            <input type="password" id="pass" name="mdp" minlength="8" size="50" placeholder="Votre mot de passe" required />


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

        <button type="submit" class="bouton" name="ok">Enregistrer</a></button>
    </form>
    <br>
    <br>

</body>

</html>