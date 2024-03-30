<?php   require('bdd.php'); ?>
<?php  
 
$requete = "select * from client";
$resultat = $bdd->query($requete);
$ligne = $resultat->fetch();
echo 'Prenom : '.$ligne['prenom'];
?>