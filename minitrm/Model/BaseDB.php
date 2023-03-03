<?php
namespace MyApp\Model;

use mysqli;
use Exception;
use MyApp\Controller\ControllerInterface;
use MyApp\lib\DB;

abstract class BaseDB {
    public function getConnectAlt() {
        try {
            //TODO notwendig?
            //TODO config files schreiben
            $mysqli = new mysqli("localhost", "root", "", "trainingneu");
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }

        try {
            $mysqli->select_db("training");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$mysqli) {
            throw new Exception("Keine Datenbank!");
        }
        return $mysqli;
    }

    public function debug(){
        $a1 = DB::getInstance()->getConnect();
        $a2 = DB::getInstance()->getConnect();
        var_dump($a1);
        var_dump($a2);
    }

    /**
     * findet alle Einträge in der Tabelle
     */
    public function find($options = "") {
//        $options = "";
        $table = $this->getSource();
        $arr_collection = array();

        $sql = "SELECT * FROM " . $table . " " . $options;
        try {
            $result = DB::getInstance()->getConnect()->query($sql);
            while ($row = $result->fetch_object("MyApp\\Model\\".$this->getSource())) {
                $arr_collection[] = $row;
            }
            return $arr_collection;
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }
    }

    public function findFirst($id) {
        $model = new static();

        $options = "WHERE id = " . $id . " LIMIT 1";
        $table = $model->getSource();

        try {
            $sql = "SELECT * FROM " . $table . " " . $options;

            $result = DB::getInstance()->getConnect()->query($sql);
            while ($row = $result->fetch_object("MyApp\\Model\\".$this->getSource())) {
                return $row;
            }
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }
    }

    public function save($idx = "") {
        $model = new static();
        $table = $model->getSource();
        $nameneu = "";
        $valueneu = "";
        $namevalue = "";
        $neuname = "";
        $neuvalue = "";
        $neunamevalue = "";
        $id = $idx;

        foreach($this as $name=>$value) {

            if ($name == "created_at") {
                $nameneu .= $name . ", ";
                $valueneu .= "'" . date("Y-m-d") . "', ";
                continue;
            }

            if ($name == "updated_at") {
                if ($name != "id") {
                    $nameneu .= $name . ", ";
                    $valueneu .= "'" . date("Y-m-d") . "', ";
                    $namevalue .= $name . " = '" . $value . "', ";
                    continue;
                }
            }
            
            $nameneu .= $name . ", ";
            $valueneu .= "'" . $value . "', ";

            if ($name != "id")
                $namevalue .= $name . " = '" . $value . "', ";
        }
        
        $neuname = substr($nameneu, 0, -2);
        $neuvalue = substr($valueneu, 0, -2);
        $neunamevalue = substr($namevalue, 0, -2);

        $mod = "insert";
        if ($id != "")
            $mod = "update";

        if ($mod == "insert") {
            try {
                $sql = "INSERT INTO " . $table . "(" . $neuname . ")
                    VALUES (" . $neuvalue . ")";
            } catch (Exception $ee) {
                echo $ee->getMessage();
            }
        } else {
            try {
                $sql = "UPDATE "  .$table .
                    " SET " . $neunamevalue .
                    " WHERE id = " . $id;
            } catch (Exception $ee) {
                echo $ee->getMessage();
            }
        }
        $mysqli = DB::getInstance()->getConnect();
        $result = $mysqli->query($sql);
        return true;
    }

    public function delete($id) {
        $model = new static();
        $table = $model->getSource();

        try {
            $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }
        $result = DB::getInstance()->getConnect()->query($sql);
    }

    abstract public function getSource();
}