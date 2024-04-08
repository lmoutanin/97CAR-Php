<?php



function filtre ($a){
    $a_nettoye = htmlspecialchars($a, ENT_QUOTES, 'UTF-8');
    return  $a_nettoye;
}

$prenom=' <script> Luc/moutanin </script>';
$email='luc.mout//->anin@gm$$ail.com';

$prenom=filtre($prenom);







$email = filter_var($email, FILTER_SANITIZE_EMAIL);



echo  $prenom;
echo $email;




?>




