<?php
require('verify/restricted-access.php');
require('verify/bdd.php');
require('menu.php');
require('class/Facture.php');

// Vérifier si les variables de session existent
if (!isset($_SESSION['token'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location: login.php');
    exit;
}

$token = $_SESSION['token'];

// Récupération des IDs de facture
$stmt = $bdd->prepare("SELECT Id_facture FROM client INNER JOIN facture ON client.Id_client = facture.Id_client");
$stmt->execute();
$factureIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Initialisation du tableau des factures
$fts = [];

// Récupération des données de facture
foreach ($factureIds as $factureId) {
    if ($token) {
        $req = $bdd->prepare("SELECT facture_reparation.Id_facture, client.Id_client, date_facture, marque, modele, sum(cout*quantite) as total 
                              FROM facture_reparation 
                              INNER JOIN facture ON facture_reparation.Id_facture = facture.Id_facture 
                              INNER JOIN voiture ON facture.Id_voiture = voiture.Id_voiture 
                              INNER JOIN client ON facture.Id_client = client.Id_client
                              INNER JOIN reparation ON facture_reparation.Id_reparation = reparation.Id_reparation 
                              WHERE facture_reparation.Id_facture = :id");
        $req->execute(['id' => $factureId]);
        $result = $req->fetchAll();
        if (!empty($result)) {
            $fts = array_merge($fts, $result);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factures Clients</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formulaire">
        <h1 align="center">Factures Clients</h1>
        <br>

        <?php if (!empty($fts)) : ?>
            <table class="formul1">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>ID</th>
                        <th>CLIENT</th>
                        <th>MARQUE</th>
                        <th>MODELE</th>
                        <th>MONTANT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0; // Initialisation de la variable $total

                    foreach ($fts as $ft_data) {
                        try {
                            // Création d'un objet Facture avec les bonnes valeurs
                            $ft = new Facture(
                                $ft_data['Id_client'],
                                0, // Remplacez par la bonne valeur si nécessaire
                                $ft_data['date_facture'],
                                $ft_data['marque'],
                                $ft_data['modele'],
                                $ft_data['total']
                            );

                            // ID de la facture à utiliser dans les liens
                            $id_facture = $ft_data['Id_facture'];
                    ?>
                            <tr>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_date(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $id_facture; ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_id_client(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_marque(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_modele(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_cout(); ?> € </td>
                            </tr>
                    <?php
                            // Additionner au total
                            $total += $ft->get_cout();
                        } catch (Exception $e) {
                            // En cas d'erreur avec une facture, continuer avec les autres
                            continue;
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div class="client">
                <h4>MONTANT TOTAL : <?php echo $total; ?> €</h4>
            </div>
        <?php else : ?>
            <div class="message">
                <p>Aucune facture trouvée.</p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>