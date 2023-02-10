<?php
include("../mysql/datenbank.php");

class Person {
    public $id;
    public $vorname;
    public $nachname;

    public function __construct() {
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

    public function load($id, $mysqli)
    {
        $sql = "SELECT * FROM personen WHERE personen.id = " . $id;
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_row()) {
            $this->id = $row[0];
            $this->setVorname($row[1]);
            $this->setNachname($row[2]);
        }
    }

    public function save($mysqli) {
        $sql = "UPDATE `personen`
            SET `vorname` = '" . $this->getVorname() . "', 
            `nachname` = '" . $this->getNachname() . "'
            WHERE id = " . $this->getId();
        $mysqli->query($sql);
    }

    public function insertPerson($mysqli) {
        $sql = "INSERT INTO personen (vorname, nachname)
            VALUES ('" . $this->getVorname() . "', '" . $this->getNachname() . "')";
        $mysqli->query($sql);

    }
}
