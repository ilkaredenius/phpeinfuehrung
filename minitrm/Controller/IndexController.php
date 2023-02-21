<?php

namespace MyApp\Controller;

use MyApp\Model\Person;
use MyApp\Model\Excercise;
use MyApp\Model\Sets;
use MyApp\Model\Split;
use MyApp\Model\Training;
use mysqli;
use Exception;

class IndexController
{
    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //minitrm/index.php?controller=index&action=index&vorname=Ilka&nachname=Redenius
        var_dump($_GET);
        $person = new Person();
    }

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
}