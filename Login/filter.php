

<?php


function filterchar($a)
{
    $nettoyage = htmlspecialchars($_POST[$a], ENT_QUOTES, 'UTF-8');
    return $nettoyage;
}
?>
 
<?php
function inscription($email, $mdp, $civilite, $prenom, $nom, $adresse, $codePostal, $ville, $telephone)
{

    require('bdd.php');

    if (
        isset($_POST[$email]) && isset($_POST[$mdp])  && isset($_POST[$civilite]) && isset($_POST[$prenom]) && isset($_POST[$nom]) && isset($_POST[$adresse])
        && isset($_POST[$codePostal]) && isset($_POST[$ville]) && isset($_POST[$telephone])
    ) {

        $email_nettoye = filter_var($_POST[$email], FILTER_SANITIZE_EMAIL);
        $mdp_nettoye = filterchar($mdp);
        $civilite_nettoye = filterchar($civilite);
        $prenom_nettoye = filterchar($prenom);
        $nom_nettoye = filterchar($nom);
        $adresse_nettoye = filterchar($adresse);
        $ville_nettoye = filterchar($ville);
        $codePostal_nettoye = filterchar($codePostal);
        $telephone_nettoye = filterchar($telephone);
    } else {
        echo "<p>Erreur  </p>";
    }

    if (
        !empty($email_nettoye) && !empty($mdp_nettoye) && !empty($civilite_nettoye)  && !empty($prenom_nettoye)
        && !empty($nom_nettoye)  && !empty($adresse_nettoye) && !empty($ville_nettoye) && !empty($codePostal_nettoye) && !empty($telephone_nettoye)
    ) {

        $requete = $bdd->prepare("INSERT INTO client (nom, prenom, telephone, code_postal, ville, civilite, mel, mdp, adresse) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $requete->bindParam(1, $nom_nettoye);
        $requete->bindParam(2, $prenom_nettoye);
        $requete->bindParam(3, $telephone_nettoye);
        $requete->bindParam(4, $codePostal_nettoye);
        $requete->bindParam(5, $ville_nettoye);
        $requete->bindParam(6, $civilite_nettoye);
        $requete->bindParam(7, $email_nettoye);
        $requete->bindParam(8, $mdp_nettoye);
        $requete->bindParam(9, $adresse_nettoye);
        $requete->execute();

        echo "<p>Merci de votre inscription   $prenom_nettoye !</p>";

        
    }else{
        echo "<p> Erreur de votre inscription </p>";
    }
}
?>

<?php 

function connexion($email ,$mdp) {


    if (isset($_POST[$email]) && isset($_POST[$mdp]))
    {

        $email_nettoye = filter_var($_POST[$email], FILTER_SANITIZE_EMAIL);
        $mdp_nettoye = filterchar($mdp);
    
    } 
    else { 

           }

}





?>
 