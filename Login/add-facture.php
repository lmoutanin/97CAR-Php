<?php
session_start();

require('verify/restricted-access.php');
require('menu.php');

require('verify/verify-add-facture.php');
require('verify/bdd.php');
require('menu.php');




$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
 
$id_client = $_SESSION['id-client'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer Client</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire">
        <form method="POST" action="">

            <h1>Crée une facture pour <?php echo $nom . ' ' . $prenom ?> </h1>

            <hr>
            <br>
            <div align="center">
               
            </div>
            <br>



            <br>

            <div class="name-field">

                <div>
                    <label>Date</label>
                    <input type="date" id="date" name="date" min="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required />


                </div>



            </div>
            <br>

            <div class="name-field">

                <div class="rp">
                    <label>Voiture </label>

                    <select name="voiture" id="pet-select">
                        <option value="">choisir</option>
                        <?php
                        $re = $bdd->prepare("SELECT modele,marque,Id_voiture FROM voiture WHERE Id_client= :id");
                        $re->execute(array('id' => $id_client));
                        $repo = $re->fetchAll();
                        $vts = $repo;


                        foreach ($vts as $vt) { ?>
                            <option value="<?php echo $vt['Id_voiture'] ?>"><?php echo $vt['marque'] . ' ' . $vt['modele']; ?></option>

                        <?php } ?>


                    </select>


                </div>

                <br>
                <div class="ds">
                    <label for="description">Réparation 1</label>


                    <select name="description1" id="pet-select">
                        <option value="">choisir</option>
                        <?php
                        $re = $bdd->prepare("SELECT * FROM reparation ");
                        $re->execute();
                        $repo = $re->fetchAll();
                        $vts = $repo;


                        foreach ($vts as $vt) { ?>
                            <option value="<?php echo $vt['Id_reparation'] ?>"><?php echo $vt['descriptions']; ?></option>

                        <?php } ?>


                    </select>
                </div>

                <div class="ds1">
                    <label for="description">Réparation 2</label>


                    <select name="description2" id="pet-select">
                        <option value="">choisir</option>
                        <?php
                        $re = $bdd->prepare("SELECT * FROM reparation ");
                        $re->execute();
                        $repo = $re->fetchAll();
                        $vts = $repo;


                        foreach ($vts as $vt) { ?>
                            <option value="<?php echo $vt['Id_reparation'] ?>"><?php echo $vt['descriptions']; ?></option>

                        <?php } ?>


                    </select>
                </div>



            </div>
            <br>

            <div class="name-field">

                <div class="ds2">
                    <label for="description">Réparation 3</label>


                    <select name="description3" id="pet-select">
                        <option class="font_moyen" value="">choisir</option>
                        <?php
                        $re = $bdd->prepare("SELECT * FROM reparation ");
                        $re->execute();
                        $repo = $re->fetchAll();
                        $vts = $repo;


                        foreach ($vts as $vt) { ?>
                            <option class="font_moyen" value="<?php echo $vt['Id_reparation'] ?>"><?php echo $vt['descriptions']; ?></option>

                        <?php } ?>


                    </select>
                </div>

                <div class="ds3">
                    <label for="description">Réparation 4</label>


                    <select name="description4" id="pet-select">
                        <option class="font_moyen" value="">choisir</option>
                        <?php
                        $re = $bdd->prepare("SELECT * FROM reparation ");
                        $re->execute();
                        $repo = $re->fetchAll();
                        $vts = $repo;


                        foreach ($vts as $vt) { ?>
                            <option class="font_moyen" value="<?php echo $vt['Id_reparation'] ?>"><?php echo $vt['descriptions']; ?></option>

                        <?php } ?>


                    </select>
                </div>

                <div class="ds4">
                    <label for="description">Réparation 5</label>


                    <select name="description5" id="pet-select">
                        <option class="font_moyen" value="">choisir</option>
                        <?php
                        $re = $bdd->prepare("SELECT * FROM reparation ");
                        $re->execute();
                        $repo = $re->fetchAll();
                        $vts = $repo;


                        foreach ($vts as $vt) { ?>
                            <option class="font_moyen" value="<?php echo $vt['Id_reparation'] ?>"><?php echo $vt['descriptions']; ?></option>

                        <?php } ?>


                    </select>
                </div>


            </div>
            <br><br><br>



            <div align="center">
                <button type="submit" class="bouton" name="ok">Ajout facture </button>
            </div>
        </form>


    </div>
</body>

</html>