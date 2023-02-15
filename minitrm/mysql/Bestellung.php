<?php
namespace MyApp;
include("../oop/BaseDB.php");


class Bestellung extends BaseDB {
    public $id;
    public $personen_id;
    public $bestellung;
    public function __construct() {
    }
    public function getSource() {
        return "Bestellung";
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

$bestellung = new Bestellung();
$bestellung->setPersonen_id(19);
$bestellung->delete(5);
/*
$bestellung->delete(2);

$arr = $bestellung->findFirst(2);
var_dump($arr);

$arr = $bestellung->find();
//var_dump($arr);
$obj = $arr[0];
var_dump($obj);
$obj->setBestellung("33333");
$obj->save();

$bestellung->setPersonen_id(19);
$bestellung->setBestellung("wwww");
$bestellung->save();
$bestellung->debug();
*/