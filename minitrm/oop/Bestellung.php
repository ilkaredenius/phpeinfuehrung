<?php
include("../mysql/datenbank.php");

class Bestellung {
    public $id;
    public $personen_id;
    public $bestellung;

    public function __construct() {
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

    public function load($id, $mysqli)
    {
        $sql = "SELECT * FROM bestellungen WHERE personen_id = " . $id;
        echo $sql;
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_row()) {
            $this->id = $row[0];
            $this->setBestellung($row[2]);
        }
    }

    public function save($mysqli) {
        $sql = "UPDATE `bestellungen`
            SET `bestellung` = '" . $this->getBestellung() . "'
            WHERE id = " . $this->getId();
        $mysqli->query($sql);
    }

    public function insertBestellung($mysqli) {
        $sql = "INSERT INTO bestellungen (personen_id, bestellung)" .
            " VALUES (" . $this->getPersonen_id() . ", " . $this->getBestellung() . ")";
        $mysqli->query($sql);

    }
}