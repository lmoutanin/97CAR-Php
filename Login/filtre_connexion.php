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



            $req = $bdd->prepare("SELECT * FROM client WHERE mel = :email AND mdp = :mdp");
            $req->execute(array('email' => $email_nettoye, 'mdp' => $mdp_nettoye));
            $client = $req->fetch();

            //Regarde si il trouve le client dans le base de donnée puis l'envoyer vers la page compte.php
            if ($client) {

                header("Location: compte.php");
                exit();

                //Sinon il affiche  Email ou mot de passe incorrect !   
            } else {

                $error_msg = "<p>Email ou mot de passe incorrect !</p>";
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
