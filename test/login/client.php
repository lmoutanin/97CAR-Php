<?php
$serverName = "localhost";
$dataName = "bdd_97car";
$username = "root";
$password = "root";


try {
    $bdd = new PDO("mysql:host=$serverName;dbname=$dataName;charset=utf8", "$username", "$password", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur fatale : ' . $e->getMessage());
}

 
// Nettoyage et validation de l'email
$email_nettoye = filter_var($_COOKIE['email'], FILTER_SANITIZE_EMAIL);

// Vérification de la validité du token
$token = $_COOKIE['token'];

// Utilisation des valeurs nettoyées dans votre requête SQL
$req = $bdd->query("SELECT * FROM client WHERE mel = '$email_nettoye' AND token = '$token'");
$rep = $req->fetch();

if ($rep !== false) {
    echo "Le prénom est : " . $rep['prenom'];
} else {
    echo "Aucun résultat trouvé pour cette combinaison email/token.";
}
