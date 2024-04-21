<?php
class  Client
{

    private $date;
    private $cout;
    private $quantite;
    private $description;


    public function __construct($date, $cout, $quantite, $description)
    {
        $date = $this->filtre($date);
        $cout = $this->filtre($cout);
        $quantite = $this->filtre($quantite);
        $description = $this->filtre($description);


        $this->date = $date;
        $this->cout = $cout;
        $this->quantite = $quantite;
        $this->description = $description;
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
