<?php 
 

function nombre($a) {

    require('client.php');
    $prenom = $rep['prenom'];
    $nom = $rep['nom'];
    

    $un = '';
    $deux = '';
    $trois = '';
    $quatre = '';

    if ($a == 1) {
        $un = 'active';
    } 
    if ($a == 2) {
        $deux = 'active';
    } 
    if ($a == 3) {
        $trois = 'active';
    } 
    if ($a == 4) {
        $quatre = 'active';
    }

 

 

echo '
<ul>
    <li><strong><p>Bonjour</p><p>'. $nom."  ". $prenom .'</p> </strong>
     <button class="button-66" role="button"><strong> Déconnexion</strong</button></li>
    <li><a class="' . $un . '" href="page.php">Home</a></li>
    <li><a class="' . $deux . '" href="page1.php">News</a></li>
    <li><a class="' . $trois . '" href="page2.php">Contact</a></li>
    <li><a class="' . $quatre . '" href="page3.php">About</a></li>
</ul>
';
} 
 
?>

 