<?php 
require('bdd.php');
$req =$bdd->prepare("INSERT INTO acheteur (id, prenom, nom, ville) VALUES(0, ?, ?, ?)");
 $prenom='luc';
 $nom='m';
 $ville='saint-andré';
 
 
$req->execute(array($prenom,$nom,$ville));










?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>