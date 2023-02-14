<?php
include("../oop/BaseDB.php");

class Bestellungen extends BaseDB {
    public $id;
    public $personen_id;
    public $bestellung;
    public function __construct() {
    }
    public function getSource() {
        return "Bestellungen";
    }

    /**
     * Get the value of personen_id
     */ 
    public function getPersonen_id()
    {
        return $this->personen_id;
    }

    /**
     * Get the value of bestellung
     */ 
    public function getBestellung()
    {
        return $this->bestellung;
    }

    /**
     * Set the value of bestellung
     *
     * @return  self
     */ 
    public function setBestellung($bestellung)
    {
        $this->bestellung = $bestellung;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}

$bestellung = new Bestellungen();
$bestellung = $bestellung->findFirst(5);
$bestellung->personen_id = 1;
$bestellung->bestellung = "qqqzzz";
$bestellung->delete(1);