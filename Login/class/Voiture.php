<?php

class Voiture 
 {
    private $marque;
    private $immatriculation;
    private $modele;
    private $kilometrage;
    private $annee;
    private $id_client;

public function __construct($marque,$immatriculation,$modele,$kilometrage,$annee,$id_client)
 {
    $marque=$this->filtre($marque);
    $immatriculation=$this->filtre($immatriculation);
    $modele=$this->filtre($modele);
    $kilometrage=$this->filtre($kilometrage);
    $annee=$this->filtre($annee);
    $id_client=$this->filtre($id_client);
    
    $this->marque=$marque;
    $this->immatriculation=$immatriculation;
    $this->modele=$modele;
    $this->kilometrage=$kilometrage;
    $this->annee=$annee;
    $this->id_client=$id_client;

}

public function filtre($a)
{
    $a_nettoye = htmlspecialchars($a, ENT_QUOTES, 'UTF-8');
    return  $a_nettoye;
}

public function get_marque()
{
    return $this->marque;
}

public function set_marque($marque)
{
    $marque = filter_var($marque, FILTER_SANITIZE_EMAIL);
    return $this->marque=$marque;
}


public function get_immatriculation()
{
    return $this->immatriculation;
}

public function set_immatriculation($immatriculation)
{
    $immatriculation = filter_var($immatriculation, FILTER_SANITIZE_EMAIL);
    return $this->immatriculation=$immatriculation;
}

public function get_modele()
{
    return $this->modele;
}
 
public function set_modele($modele)
{
    $modele = filter_var($modele, FILTER_SANITIZE_EMAIL);
    return $this->modele=$modele;
}

public function get_kilometrage()
{
    return $this->kilometrage;
}

public function set_kilometrage($kilometrage)
{
    $kilometrage = filter_var($kilometrage, FILTER_SANITIZE_EMAIL);
    return $this->kilometrage=$kilometrage;
}

public function get_annee()
{
    return $this->annee;
}

public function set_annee($annee)
{
    $annee = filter_var($annee, FILTER_SANITIZE_EMAIL);
    return $this->annee=$annee;
}

public function get_id_client()
{
    return $this->id_client;
}

public function set_id_client($id_client)
{
    $id_client = filter_var($id_client, FILTER_SANITIZE_EMAIL);
    return $this->id_client=$id_client;
}

 }