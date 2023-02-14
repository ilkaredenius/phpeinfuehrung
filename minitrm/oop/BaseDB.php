<?php
abstract class BaseDB {
    public $mysqli;

    public function getConnect() {
        $mysqli = new mysqli("localhost", "root", "", "minitrm");
        $mysqli->select_db("minitrm");
        return $mysqli;
    }

    public function debug(){
        var_dump($this);
    }

    public function find($options) {
        $options = "";
        $table = $this->getSource();

        $sql = "SELECT * FROM " . $table . " " . $options;
        $result = $this->getConnect()->query($sql);
        while ($row = $result->fetch_object($this->getSource())) {
//            print_r($row);
            $arr_collection[] = $row;
        }
        return $arr_collection;
    }
    public function findFirst($id) {
        $options = "WHERE id = " . $id . " LIMIT 1";
        $table = $this->getSource();

        $sql = "SELECT * FROM " . $table . " " . $options;
        $result = $this->getConnect()->query($sql);
        $row = $result->fetch_object($this->getSource());
        return $row;
    }

    public function save() {
        $table = $this->getSource();

        $sql = "UPDATE " . $table . "SET 
            VALUES (SPALTENWERTE)";
    }



    //insert
    /*$sql = "INSERT INTO personen (vorname, nachname)
            VALUES ('" . $this->getVorname() . "', '" . $this->getNachname() . "')";*/

    //update und save
    /*$sql = "UPDATE `personen`
            SET `vorname` = '" . $this->getVorname() . "', 
            `nachname` = '" . $this->getNachname() . "'
            WHERE id = " . $this->getId();*/

    //delete
    //$sql = "DELETE FROM personen WHERE id = " . $id;


    abstract public function getSource();
}