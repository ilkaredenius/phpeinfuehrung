<?php
namespace MyApp;
include("../oop/BaseDB.php");

class Person extends BaseDB {
    public $id;
    public $vorname;
    public $nachname;

    public function __construct() {
    }
    
    public function getSource() {
        return "Person";
    }

    /**
     * Get the value of vorname
     */ 
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Set the value of vorname
     *
     * @return  self
     */ 
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Get the value of nachname
     */ 
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * Set the value of nachname
     *
     * @return  self
     */ 
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;

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
$person = new Person();
/*
$person->setVorname("Marie");
$person->setNachname("Weiler");
$person->save();
$person->debug();

$arr = $person->find();

$arr = $person->findFirst(2);
*/
$person->delete(16);

//var_dump($arr);
