<?php 
require('bdd.php');

$error_msg = "";

if (isset($_POST['ok'])) {

$marque=$_POST['marque'];
$modele=$_POST['modele'];
$kilometrage=$_POST['kilometrage'];
$imma=$_POST['imma1'].'-'.$_POST['imma2'].'-'.$_POST['imma3'];
$annee = date('Y', strtotime($_POST['annee']));
$id='r';


$voiture = new Voiture($marque,$imma,$modele,$kilometrage,$annee,$id);

echo $voiture->get_modele();


}

 





?>