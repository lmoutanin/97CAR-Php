<?php

class Facture
{


    private $id_client;
    private $id_voiture;
    private $date;
    private $marque;
    private $modele;
    private $cout;
    private $quantite;
    private $description;
    private $total;



    public function  __construct($id_client, $id_voiture, $date, $marque, $modele, $cout, $quantite, $description)
    {

        $this->id_client = $this->filtre($id_client);
        $this->id_voiture = $this->filtre($id_voiture);
        $this->date = $this->filtre($date);
        $this->marque = $this->filtre($marque);
        $this->modele = $this->filtre($modele);
        $this->cout = $this->filtre($cout);
        $this->quantite = $this->filtre($quantite);
        $this->description = $this->filtre($description);
    }





    public function filtre($a)
    {
        $a_nettoye = htmlspecialchars($a, ENT_QUOTES, 'UTF-8');
        return  $a_nettoye;
    }

    public function total()
    {
        $total = $this->cout * $this->quantite;
        return  $this->total = $total;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function set_date($date)
    {
        $date = $this->filtre($date);
        $this->date = $date;
    }

    public function get_id_client()
    {
        return $this->id_client;
    }

    public function set_id_client($id_client)
    {
        $id_client = $this->filtre($id_client);
        $this->id_client = $id_client;
    }


    public function get_id_voiture()
    {
        return $this->id_voiture;
    }

    public function set_id_voiture($id_voiture)
    {
        $id_voiture = $this->filtre($id_voiture);
        $this->id_voiture = $id_voiture;
    }


    public function get_marque()
    {
        return $this->marque;
    }

    public function set_marque($marque)
    {
        $marque = $this->filtre($marque);
        $this->marque = $marque;
    }


    public function get_modele()
    {
        return $this->modele;
    }

    public function set_modele($modele)
    {
        $modele = $this->filtre($modele);
        $this->modele = $modele;
    }




    public function get_cout()
    {
        return $this->cout;
    }

    public function set_cout($cout)
    {
        $cout = $this->filtre($cout);
        $this->cout = $cout;
    }

    public function get_quantite()
    {
        return $this->quantite;
    }

    public function set_quantite($quantite)
    {
        $quantite = $this->filtre($quantite);
        $this->quantite = $quantite;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function set_description($description)
    {
        $description = $this->filtre($description);
        $this->description = $description;
    }
}
