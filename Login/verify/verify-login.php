<?php

require('bdd.php');


$error_msg = "";

//verifier si la methode POST est bien utiliser 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $mdp = $_POST['mdp'];

    //verifier si les champs user et mdp ne sont pas vide 
    if (!empty($user) && !empty($mdp)) {
        $user_nettoye = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
        $mdp_nettoye = htmlspecialchars($mdp, ENT_QUOTES, 'UTF-8');

        //verifier si l'user à bien était netroyer 
        if (htmlspecialchars($user, ENT_QUOTES, 'UTF-8') && htmlspecialchars($mdp, ENT_QUOTES, 'UTF-8')) {


            //envoyer une rêquete dans la table acheteur pour verifier la presence user et du mot passe .Si c'est dernier sont égal alors l'utilisateur existe 

            $token = bin2hex(random_bytes(32)); // Générer un token aléatoire

            $req = $bdd->prepare("SELECT * FROM login WHERE user = :user AND mdp = :mdp"); // Préparer la requête SQL pour récupérer les informations du client
            $req->execute(array('user' => $user_nettoye, 'mdp' => $mdp_nettoye)); // Exécuter la requête en utilisant les valeurs nettoyées de l'user et du mot de passe
            $rep = $req->fetch(); // Récupérer la ligne résultante de la requête

            // Vérifier si le client est trouvé dans la base de données, puis le rediriger vers la page compte.php
            if ($rep !== false) {

                //   mettre à jour le token du client
                $update_req = $bdd->prepare("UPDATE login SET token = :token WHERE user = :user AND mdp = :mdp");
                $update_req->execute(array('token' => $token, 'user' => $user_nettoye, 'mdp' => $mdp_nettoye)); //   mise à jour avec le nouveau token


                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                };
                $_SESSION['token'] = $token;
                $_SESSION['user'] = $user_nettoye;



                header("Location: ./home.php"); // Rediriger vers la page du compte
                exit();
            } else {
                $error_msg = "<p>user ou mot de passe incorrect !</p>"; // Afficher un message d'erreur si les identifiants sont incorrects
            }



            //Sinon user invalide !
        } else {
            $error_msg = "<p>user invalide !</p>";
        }

        //Sinon Veuillez remplir tous les champs !
    } else {
        $error_msg = "<p>Veuillez remplir tous les champs !</p>";
    }
}
