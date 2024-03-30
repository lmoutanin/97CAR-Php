<?php
$dbhost = 'localhost';
$dbname = 'bdd_97car';
$dbuser = 'luc';
$dbmdp = 'a';

?>
<?php
try {
    $bdd = new PDO(
        "mysql:host=$dbhost;dbname=$dbname;charset=utf8",
        "root",
        "root",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die('Erreur fatale : ' . $e->getMessage());
}

?>

</body>

</html>