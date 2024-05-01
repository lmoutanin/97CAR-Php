<?php
session_start();

require('verify/restricted-access.php');
require('menu.php');

require('class/Client.php');

$id = $_SESSION['id-client'];

if ($id) {
    $req = $bdd->prepare("SELECT * FROM client WHERE Id_client = :id");
    $req->execute(array('id' => $id));
    $repondre = $req->fetch();
    $_SESSION['nom'] =  $repondre['nom'];
    $_SESSION['prenom'] = $repondre['prenom'];

    $client = new Client($repondre['mel'], $repondre['prenom'], $repondre['nom'], $repondre['adresse'], $repondre['code_postal'], $repondre['ville'], $repondre['telephone'], $repondre['Id_client']);
} ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo 'Information' . $nom . ' ' . $prenom;  ?> </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire">
        <form method="POST" action="">


            <h1>Information <?php echo $client->get_nom() . " " . $client->get_prenom(); ?> </h1>
            <?php
            echo $msg_ins;
            echo $error_msg;
            ?>

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
                    <input type="text" id="adresse" name="adresse" minlength="2" maxlength="100" size="30" placeholder="Votre adresse" readonly="true" value="<?php echo $client->get_adresse(); ?>" required />
                </div>

                <div>
                    <label for="codePostal"> Code postal </label>
                    <input type="text" id="codePostal" name="codePostal" pattern="[0-9]{5}" size="30" placeholder="Votre code postal" readonly="true" value="<?php echo $client->get_codePostal(); ?>" required />
                </div>

            </div>


            <div class="name-field">

                <div>
                    <label for="ville"> Ville </label>
                    <input type="text" id="ville" name="ville" minlength="2" maxlength="50" size="30" placeholder="Votre ville" readonly="true" value="<?php echo $client->get_ville(); ?>" required />
                </div>

                <div>
                    <label for="telephone"> Téléphone </label>
                    <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" size="30" placeholder="Votre téléphone" readonly="true" value="<?php echo  $client->get_telephone(); ?>" required />
                </div>

            </div>


            <div class="name-field">

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" size="30" name="email" placeholder="Votre email" readonly="true" value="<?php echo $client->get_email(); ?>" required />
                </div>


            </div>
            <br>

        </form>
    </div>
</body>

</html>