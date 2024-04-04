<?php require('bdd.php');

$error_msg = "";


//verifier si on à bien appuyer sur le bouton ok 
if (isset($_POST['ok'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $civilite = $_POST['civilite'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];

    //  verifier si les champs email , mdp ,civilite ,prenom ,nom ,adresse , codePostal ,ville et telephone  ne sont pas vide
    if (!empty($email) && !empty($mdp) && !empty($civilite)  &&  !empty($prenom) &&  !empty($nom)   &&  !empty($adresse)   &&  !empty($codePostal)   &&  !empty($ville) &&  !empty($telephone)) {

        $email_nettoye = filter_var($email, FILTER_SANITIZE_EMAIL);
        $mdp_nettoye = htmlspecialchars($mdp, ENT_QUOTES, 'UTF-8');
        $civilite_nettoye = htmlspecialchars($civilite, ENT_QUOTES, 'UTF-8');
        $prenom_nettoye = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');
        $nom_nettoye = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
        $adresse_nettoye = htmlspecialchars($adresse, ENT_QUOTES, 'UTF-8');
        $codePostal_nettoye = htmlspecialchars($codePostal, ENT_QUOTES, 'UTF-8');
        $ville_nettoye = htmlspecialchars($ville, ENT_QUOTES, 'UTF-8');
        $telephone_nettoye = htmlspecialchars($telephone, ENT_QUOTES, 'UTF-8');

        //verifier si l'email à bien était netroyer 
        if (filter_var($email_nettoye, FILTER_VALIDATE_EMAIL)) {

            $req = $bdd->prepare("SELECT * FROM client WHERE mel = :email");
            $req->execute(array('email' => $email_nettoye));
            $client = $req->fetch();


            //verifier si l'email est différent des autre email dans la base de données 
            if (!$client) {

                // envoyer dans la base donnée une requête pour ajoute les valeurs  suivantes dans la table acheteur 
                $req = $bdd->prepare("INSERT INTO client (id_client,mel,token,mdp,civilite,prenom,nom,adresse,code_postal,ville,telephone) VALUES(0,:mel,:token,:mdp,:civilite,:prenom,:nom,:adresse,:code_postal,:ville,:telephone)");
                $req->execute(array('mel' => $email_nettoye,':token' =>'1', 'mdp' => $mdp_nettoye, 'civilite' => $civilite_nettoye, 'prenom' => $prenom_nettoye, 'nom' => $nom_nettoye, 'adresse' =>  $adresse_nettoye, 'code_postal' => $codePostal_nettoye, 'ville' => $ville_nettoye, 'telephone' => $telephone_nettoye));
                $connexion = true;

                header("Location: client.php");
                exit();




                //Sinon affiche L'adresse mail existe déjà.
            } else {

                $error_msg = "L'adresse mail existe déjà.";
            }
            //Sinon affiche Veuillez information non filtre  !
        } else {
            $error_msg = "<p>Email invalide !</p>";
        }
        //Sinon affiche Veuillez remplir tous les champs !
    } else {
        $error_msg = "<p>Veuillez remplir tous les champs !</p>";
    }
}
