<?php
class  Client
{

    private $email;
    private $mdp;
    private $civilite;
    private $prenom;
    private $nom;
    private $adresse;
    private $codePostal;
    private $ville;
    private $telephone;

    public function __construct($email, $mdp, $civilite, $prenom, $nom, $adresse, $codePostal, $ville, $telephone)
    {

       $email =filter_var($email, FILTER_SANITIZE_EMAIL);
       $mdp=$this->filtre($mdp);
       $civilite=$this->filtre($civilite);
       $prenom=$this->filtre($prenom);
       $nom=$this->filtre($nom);
       $adresse=$this->filtre($adresse);
       $codePostal=$this->filtre($codePostal);
       $ville=$this->filtre($ville);
       $telephone=$this->filtre($telephone);

        $this->email = $email;
        $this->mdp = $mdp;
        $this->civilite = $civilite;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->telephone = $telephone;
    }

    public function filtre ($a){
        $a_nettoye = htmlspecialchars($a, ENT_QUOTES, 'UTF-8');
        return  $a_nettoye;
    }



    public function get_email()
    {
        return $this->email;
    }

    public function set_email($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->email = $email;
    }


    public function get_mdp()
    {
        
        return $this->mdp;
    }

    public function set_mdp($mdp)
    {
        $mdp=$this->filtre($mdp);
        $this->mdp = $mdp;
    }

    public function get_civilite()
    {
        return $this->civilite;
    }

    public function set_civilite($civilite)
    {
        $civilite=$this->filtre($civilite);
        $this->civilite = $civilite;
    }

    public function get_prenom()
    {
        return $this->prenom;
    }

    public function set_prenom($prenom)
    {
        $prenom=$this->filtre($prenom);
        $this->prenom = $prenom;
    }

    public function get_nom()
    {
        return $this->nom;
    }

    public function set_nom($nom)
    {
        $nom=$this->filtre($nom);
        $this->nom = $nom;
    }

    public function get_adresse()
    {
        return $this->adresse;
    }

    public function set_adresse($adresse)
    {
        $adresse=$this->filtre($adresse);
        $this->adresse = $adresse;
    }
    
    public function get_codePostal()
    {
        return $this->codePostal;
    }

    public function set_codePostal($codePostal)
    {
        $codePostal=$this->filtre($codePostal);
        $this->codePostal=$codePostal;
    }

    public function get_ville()
    {
        return $this->ville;
    }

    public function set_ville ($ville)
    {
        $ville=$this->filtre($ville);
         $this->ville=$ville;
    }

    public  function get_telephone()
    {
        return $this->telephone;
    }

    public function set_telephone($telephone)
    {
        $telephone=$this->filtre($telephone);
        $this->telephone=$telephone;
    }
}
?>