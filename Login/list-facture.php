<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require('verify/restricted-access.php');
require('verify/bdd.php');
require('menu.php');
require('class/Facture.php');

// Vérifier si les variables de session existent
if (!isset($_SESSION['token']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location: login.php');
    exit;
}

$token = $_SESSION['token'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

if ($token) {
    $req = $bdd->prepare("SELECT facture.Id_facture, facture.Id_client, facture.Id_voiture, facture.date_facture, 
                        voiture.marque, voiture.modele, 
                        reparation.descriptions, reparation.cout, reparation.quantite, 
                        client.nom, client.prenom
                    FROM facture_reparation 
                    INNER JOIN facture ON facture_reparation.Id_facture = facture.Id_facture
                    INNER JOIN reparation ON facture_reparation.Id_reparation = reparation.Id_reparation
                    INNER JOIN voiture ON facture.Id_voiture = voiture.Id_voiture
                    INNER JOIN client ON facture.Id_client = client.Id_client  
                    ORDER BY facture.date_facture DESC");
    $req->execute();
    $fts = $req->fetchAll();
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
                        <th>MARQUE</th>
                        <th>MODELE</th>
                        <th>DESCRIPTION</th>
                        <th>QUANTITE</th>
                        <th>COUT</th>
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
                                $ft_data['Id_voiture'],
                                $ft_data['date_facture'],
                                $ft_data['marque'],
                                $ft_data['modele'],
                                $ft_data['cout'],
                                $ft_data['quantite'],
                                $ft_data['descriptions']
                            );

                            // ID de la facture à utiliser dans les liens
                            $id_facture = $ft_data['Id_facture'];
                    ?>
                            <tr>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_date(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_marque(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_modele(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_description(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_quantite(); ?> </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->get_cout(); ?> € </td>
                                <td onclick="location.href='client-facture.php?fa=<?php echo $id_facture; ?>'"> <?php echo $ft->total(); ?> € </td>
                            </tr>
                    <?php
                            // Additionner au total
                            $total += $ft->total();
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