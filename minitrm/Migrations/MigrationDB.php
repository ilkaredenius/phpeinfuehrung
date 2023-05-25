<?php
namespace MyApp\Migrations;

use mysqli;
use MyApp\Controller\ControllerInterface;

use Exception;
use MyApp\lib\DB;

abstract class MigrationDB {
    protected $collumns = []; 
    public function debug(){
        $a1 = DB::getInstance()->getConnect();
        $a2 = DB::getInstance()->getConnect();
        var_dump($a1);
        var_dump($a2);
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

    public function createColumn($spaltename, $spaltetyp, $null) {
        
        $this->collumns[] = "`" . $spaltename ."` " . $spaltetyp . " " . $null . ",";

        return $this->collumns;
    }

    public function createTable() {
        
        $sqlpart = "";

        foreach ($this->collumns as $collumn) {
            $sqlpart .= $collumn;
        }
        $sqlpart = substr($sqlpart, 0, -1);

        $sql = "CREATE TABLE " . $this->getSource() . " (" .
            $sqlpart . "
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
echo $sql;
        $result = DB::getInstance()->getConnect()->query($sql);
        
    
    }

    abstract public function getSource();
}