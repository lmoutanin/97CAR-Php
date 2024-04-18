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
    