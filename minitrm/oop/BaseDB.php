<?php
abstract class BaseDB {
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
            $arr_collection[] = $row;
        }
        return $arr_collection;
    }
    public function findFirst($id) {
        $model = new static();

        $options = "WHERE id = " . $id . " LIMIT 1";
        $table = $model->getSource();

        $sql = "SELECT * FROM " . $table . " " . $options;

        $result = $model->getConnect()->query($sql);
        while ($row = $result->fetch_object($this->getSource())) {
            return $row;
        }
    }

    public function save() {
        $model = new static();
        $table = $model->getSource();
        $nameneu = "";
        $valueneu = "";
        $namevalue = "";

        foreach($this as $name=>$value) {echo $name . "--" . $value;
            if ($name == "id" && !isset($value)) {
                $mod = "insert";

                $nameneu .= $name . ", ";
                $valueneu .= "'" . $value . "', ";
            } else {
                $mod = "update";
                if ($name != "id") {
                    $namevalue .= $name . " = '" . $value . "', ";
                } else {
                    $id = $value;
                }
            }
            var_dump($name);
        }
        $neuname = substr($nameneu, 0, -2);
        $neuvalue = substr($valueneu, 0, -2);
        $neunamevalue = substr($namevalue, 0, -2);
echo"M" . $mod;

        if ($mod == "insert") {
            $sql = "INSERT INTO " . $table . "(" . $neuname . ")
                VALUES ('" . $neuvalue . "')";print_r($sql);

        } else {
            $sql = "UPDATE "  .$table .
                    " SET " . $neunamevalue .
                    " WHERE id = " . $id;
        }
 //       $result = $model->getConnect()->query($sql);
    }

    public function delete($id) {
        $model = new static();
        $table = $model->getSource();

        $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
        $result = $model->getConnect()->query($sql);
    }

    abstract public function getSource();
}