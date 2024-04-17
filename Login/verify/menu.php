<?php
 
require('restricted-access.php');

function nombre($a)
{
   session_start();
    require('restricted-access.php');

    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];

   

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
    <form class="formule"  method="post">
<ul>
    <li><strong><p>Bonjour</p></strong> <em>' . $nom . "  " . $prenom . '</em>  
 
     <button class="button-66"   type="submit" class="bouton" name="déconnexion"  ><strong>  Déconnexion </strong></button></li>
    
    <li><a class="' . $un . '" href="mes-information.php">Mes informations</a></li>
    <li><a class="' . $deux . '" href="mes-voiture.php">Mes voitures</a></li>
    <li><a class="' . $trois . '" href="reparation.php">Mes réparations</a></li>
    <li><a class="' . $quatre . '" href="facture.php">Mes factures</a></li>
</ul>
</form>
';
}

if (isset($_POST['déconnexion'])) {


    $_SESSION = array();
    session_destroy();
}

