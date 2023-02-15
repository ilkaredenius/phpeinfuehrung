<?php
namespace MyApp;
use mysqli;
use Exception;

abstract class BaseDB {
    public function getConnect() {
        try {
            $mysqli = new mysqli("localhost", "root", "", "minitrm");
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }

        try {
            $mysqli->select_db("minitrm");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$mysqli) {
            throw new Exception("Keine Datenbank!");
        }
        return $mysqli;
    }

    public function debug(){
        var_dump($this);
    }

    public function find($options = "") {
        $options = "";
        $table = $this->getSource();

        $sql = "SELECT * FROM " . $table . " " . $options;
        try {
            $result = $this->getConnect()->query($sql);
            while ($row = $result->fetch_object("MyApp\\".$this->getSource())) {
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

            $result = $model->getConnect()->query($sql);
            while ($row = $result->fetch_object("MyApp\\".$this->getSource())) {
                return $row;
            }
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }
    }

    public function save() {
        $model = new static();
        $table = $model->getSource();
        $nameneu = "";
        $valueneu = "";
        $namevalue = "";
        $neuname = "";
        $neuvalue = "";
        $neunamevalue = "";
        $id = "";

        foreach($this as $name=>$value) {
            if ($name == "id") {
                $id = $value;
            }
            
            $nameneu .= $name . ", ";
            $valueneu .= "'" . $value . "', ";
            $namevalue .= $name . " = '" . $value . "', ";
        }
        
        $neuname = substr($nameneu, 0, -2);
        $neuvalue = substr($valueneu, 0, -2);
        $neunamevalue = substr($namevalue, 0, -2);

        $mod = "insert";
        if (isset($id)) 
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
                $sql = "UPDATE a"  .$table .
                    " SET " . $neunamevalue .
                    " WHERE id = " . $id;
            } catch (Exception $ee) {
                echo $ee->getMessage();
            }
        }echo $sql;
        $result = $model->getConnect()->query($sql);
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
        $result = $model->getConnect()->query($sql);
    }

    abstract public function getSource();
}