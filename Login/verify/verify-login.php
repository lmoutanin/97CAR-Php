<?php
require('bdd.php');

$error_msg = "";

//verifier si la methode POST est bien utiliser 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    //verifier si les champs email et mdp ne sont pas vide 
    if (!empty($email) && !empty($mdp)) {
        $email_nettoye = filter_var($email, FILTER_SANITIZE_EMAIL);
        $mdp_nettoye = htmlspecialchars($mdp, ENT_QUOTES, 'UTF-8');

        //verifier si l'email à bien était netroyer 
        if (filter_var($email_nettoye, FILTER_VALIDATE_EMAIL)) {


            //envoyer une rêquete dans la table acheteur pour verifier la presence mel et du mot passe .Si c'est dernier sont égal alors l'utilisateur existe 

            $token = bin2hex(random_bytes(32)); // Générer un token aléatoire

            $req = $bdd->prepare("SELECT * FROM client WHERE mel = :email AND mdp = :mdp"); // Préparer la requête SQL pour récupérer les informations du client
            $req->execute(array('email' => $email_nettoye, 'mdp' => $mdp_nettoye)); // Exécuter la requête en utilisant les valeurs nettoyées de l'email et du mot de passe
            $rep = $req->fetch(); // Récupérer la ligne résultante de la requête

            // Vérifier si le client est trouvé dans la base de données, puis le rediriger vers la page compte.php
            if ($rep !== false) {

                //   mettre à jour le token du client
                $update_req = $bdd->prepare("UPDATE client SET token = :token WHERE mel = :email AND mdp = :mdp");
                $update_req->execute(array('token' => $token, 'email' => $email_nettoye, 'mdp' => $mdp_nettoye)); //   mise à jour avec le nouveau token


                session_start();
                $_SESSION['token'] = $token;
                $_SESSION['email'] = $email_nettoye;
                $_SESSION['nom'] = $rep['nom'];
                $_SESSION['prenom'] = $rep['prenom'];


                header("Location: ./information.php"); // Rediriger vers la page du compte
                exit();
            } else {
                $error_msg = "<p>Email ou mot de passe incorrect !</p>"; // Afficher un message d'erreur si les identifiants sont incorrects
            }



            //Sinon Email invalide !
        } else {
            $error_msg = "<p>Email invalide !</p>";
        }

        //Sinon Veuillez remplir tous les champs !
    } else {
        $error_msg = "<p>Veuillez remplir tous les champs !</p>";
    }
}
