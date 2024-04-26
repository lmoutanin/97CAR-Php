<?php

class Facture
{

    private $date;
    private $id_client;
    private $id_voiture;
    private $total;


    public function  __construct($date, $id_client, $id_voiture)
    {

        $date = $this->filtre($date);
        $id_client = $this->filtre($id_client);
        $id_voiture = $this->filtre($id_voiture);



        $this->date = $date;
        $this->id_client = $id_client;
        $this->id_voiture = $id_voiture;
    }


    public function filtre($a)
    {
        $a_nettoye = htmlspecialchars($a, ENT_QUOTES, 'UTF-8');
        return  $a_nettoye;
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


    public function total($total)
    {
        $this->total = $total;
        return $total;
    }
}
