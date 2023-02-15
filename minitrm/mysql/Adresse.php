<?php
namespace MyApp;
include("../oop/BaseDB.php");


class Adresse extends BaseDB {
    public $id;
    public $personen_id;
    public $strasse;
    public $plz;
    public $ort;
    public function __construct() {
    }
    public function getSource() {
        return "Adresse";
    }

    /**
     * Get the value of personen_id
     */ 
    public function getPersonen_id()
    {
        return $this->personen_id;
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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of strasse
     */ 
    public function getStrasse()
    {
        return $this->strasse;
    }

    /**
     * Set the value of strasse
     *
     * @return  self
     */ 
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;

        return $this;
    }

    /**
     * Get the value of plz
     */ 
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set the value of plz
     *
     * @return  self
     */ 
    public function setPlz($plz)
    {
        $this->plz = $plz;

        return $this;
    }

    /**
     * Get the value of ort
     */ 
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set the value of ort
     *
     * @return  self
     */ 
    public function setOrt($ort)
    {
        $this->ort = $ort;

        return $this;
    }
}
$adresse = new Adresse();
$adresse->setPersonen_id(19);

/*
$adresse->delete(1);

$arr = $adresse->findFirst(1);
var_dump($arr);

$arr = $adresse->find();
var_dump($arr);


$adresse->setPersonen_id(19);
$adresse->setStrasse("Neuer Weg 4");
$adresse->setPlz("12345");
$adresse->setOrt("Hausen");
$adresse->save();
$adresse->debug();
*/
