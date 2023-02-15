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

    /**
     * Set the value of personen_id
     *
     * @return  self
     */ 
    public function setPersonen_id($personen_id)
    {
        $this->personen_id = $personen_id;

        return $this;
    }
}

$bestellung = new Bestellungen();
$bestellung->setPersonen_id(16);
$bestellung->setBestellung("wwww");
$bestellung->save();
$bestellung->debug();
