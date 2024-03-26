
<?php 

require('filter.php');


$email='email';
$password='password';
$civilite='civilite'; 
$prenom='prenom'; 
$nom='nom'; 
$adresse='adresse'; 
$codePostal='codePostal'; 
$ville='ville'; 
$telephone='telephone'; 

$email_nettoye = filter_var($_POST[$email], FILTER_SANITIZE_EMAIL);
$password_nettoye=filterchar($password);
$civilite_nettoye=filterchar($civilite);
$prenom_nettoye=filterchar($prenom);
$nom_nettoye=filterchar($nom);
$adresse_nettoye=filterchar($adresse);
$codePostal_nettoye=filter_var($_POST[$codePostal], FILTER_SANITIZE_NUMBER_INT);
$ville_nettoye=filterchar($ville);
$telephone_nettoye = filter_var($_POST[$telephone], FILTER_SANITIZE_NUMBER_INT);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
echo 
<?php
echo "Prénom : $prenom_nettoye  Nom :  $nom_nettoye Email :$email_nettoye Mot de passe : $password_nettoye ";
echo " Civilité :$civilite_nettoye Adresse:$adresse_nettoye Code postal:$codePostal_nettoye  Ville: $ville_nettoye Telephone : $telephone_nettoye";
?>

<?php
$a = "john(.doe)@exa//mple.com";
$b = 'bogus - at - example dot org';
$c = '(bogus@example.org)';

$sanitized_a = filter_var($a, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_a, FILTER_VALIDATE_EMAIL)) {
    echo "Cette (a) adresse email nettoyée est considérée comme valide.   $a  ";
}
   else{
    echo'echec';
   } ?>

</body>
</html>