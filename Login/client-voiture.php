<?php
session_start();
require('verify/restricted-access.php');
require('class/Voiture.php');
require('verify/bdd.php');
require('menu.php');
$id=$_SESSION['id'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
 
if($id){
    $req = $bdd->prepare("SELECT * FROM voiture WHERE Id_client = :id");
    $req->execute(array('id' => $id ));
    $repondres = $req->fetchAll();
     
    
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo'Voiture de '. $nom.' '.$prenom;  ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire ">


        <h1>   <?php echo 'Liste des voitures de '.$nom.' '.$prenom; ?> </h1>
        <br>
 
        <table class="formul1">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>ID VOITURE</th>
                    <th>MARQUE</th>
                    <th>MODÉLE</th>
                    <th>ANNÉE</th>
                    <th>KILOMETRATE</th>
                    <th>IMMATRICULATION</th>
                    <th>FACTURE</th>
                    <th>MODIFIER</th>
                    <th>SUPPRIMER</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($repondres as $repondre) {
                    $voiture  = new Voiture($repondre['marque'], $repondre['immatriculation'], $repondre['modele'], $repondre['kilometrage'], $repondre['annee'], $repondre['Id_client'], $repondre['Id_voiture']);

                ?>


                    <tr>
                    <td>  <?php echo  $voiture->get_id_client(); ?> </td>

                    <td>   <?php echo $voiture->get_id_voiture(); ?></td>
                    <td>     <?php echo $voiture->get_marque(); ?></td>
                    <td>    <?php echo $voiture->get_modele(); ?></td>

                    <td>    <?php echo $voiture->get_annee(); ?></td>
                    <td>   <?php  echo $voiture->get_kilometrage(); ?></td>
                    <td>    <?php echo $voiture->get_immatriculation(); ?></td>
                     
                    <td  onclick="location.href='add-facture.php?id=<?php echo $voiture->get_id_voiture();?>'" > <i class="fa-solid fa-car-rear"></i> </td>
                    <td  onclick="location.href='add-facture.php?id=<?php echo $voiture->get_id_voiture(); ?>'" > <i class="fa-solid fa-toolbox"></i></td>
                    <td onClick="return confirm('Etes-vous sûr que vous voulez supprimer <?php echo $voiture->get_marque().' '.$voiture->get_modele()  ?>  ?')"   href='delete.php?id=$id' type='button' class='btn btn-danger' ?><i class="fa-solid fa-trash-can"></i></td>
                    </tr>




                   
                <?php  } ?>

            </tbody>



        </table>




    </div>


</body>

</html>