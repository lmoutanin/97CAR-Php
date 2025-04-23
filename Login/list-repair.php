<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

require('verify/restricted-access.php');
require('verify/bdd.php'); // Ajout de la connexion à la base de données
require('menu.php');
require('class/Repair.php');

// Récupération des réparations depuis la base de données
$req = $bdd->prepare("SELECT * FROM reparation");
$req->execute();
$rpts = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réparations</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire">
        <h1>Liste des réparations</h1><br>

        <table class="formul1">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Coût unitaire</th>
                    <th>TOTAL</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($rpts)) {
                    foreach ($rpts as $rpt) {
                        // Vérifier que les indices existent dans le tableau
                        $id = isset($rpt['Id_reparation']) ? $rpt['Id_reparation'] : (isset($rpt['id']) ? $rpt['id'] : 0);
                        $repair = new Repair($rpt['cout'], $rpt['quantite'], $rpt['descriptions'], $id);
                ?>
                        <tr>
                            <td><?php echo $repair->get_description(); ?></td>
                            <td><?php echo $repair->get_quantite(); ?></td>
                            <td><?php echo $repair->get_cout(); ?> €</td>
                            <td><?php echo $repair->get_quantite() * $repair->get_cout(); ?> €</td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="4">Aucune réparation trouvée</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>