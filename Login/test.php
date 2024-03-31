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
$requete = "SELECT * FROM client WHERE mel = '$login'";
$resultat = $bdd->query($requete);
$ligne = $resultat->fetch();
$existe=$ligne['mel'];

if($existe==$login){
    echo "réussite existe=$existe  login=$login";
    sleep(5);
    header("Location:inscription.php");
 

}else{
    echo"erreur";
}


 

 
?>
</body>
</html>