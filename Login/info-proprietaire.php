<?php
 session_start();
include('verify/bdd.php');
require('class/Client.php');
require('menu.php');

$id = $_SESSION['id'];
 
$req = $bdd->prepare("SELECT * FROM client WHERE Id_client = :id");
$req->execute(array('id' => $id ));
$repondre = $req->fetch();
 
$client = new Client($repondre['mel'], $repondre['prenom'], $repondre['nom'], $repondre['adresse'], $repondre['code_postal'], $repondre['ville'], $repondre['telephone'], $repondre['Id_client']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes Informations </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <div class="formulaire">
        <form method="POST" action="">


            <h1>Informations <?php echo $client->get_nom() . " " . $client->get_prenom(); ?> </h1>
            <hr>
            
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


            <div class="name-field"  >

                <div   >
                    <label for="email">Email</label>
                    <input type="email" id="email" size="30" name="email" placeholder="Votre email" value="<?php echo $client->get_email(); ?>" required />
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