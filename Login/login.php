<?php require('bdd.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client</title>
</head>
<body>
<?php
$login=$_POST['email'];
$password=$_POST['mdp'];
$requete = "SELECT * FROM client WHERE mel = '$login' AND mdp = '$password'";

$resultat = $bdd->query($requete);
$ligne = $resultat->fetch();
 
echo 'Prenom : '.$ligne['prenom'].' Nom : '.$ligne['nom'];


?>
</body>
</html>