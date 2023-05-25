<?php
namespace MyApp\Migrations;

require("MigrationDB.php");

class Sets extends \MyApp\Migrations\MigrationDB {
    public function __construct() {
        $this->createColumn("id", "int(11)", "null");
        $this->createColumn("training_id", "int(11)", "not null");
        $this->createColumn("weight", "int(11)", "null");
        $this->createColumn("repetitions", "int(11)", "null");
        $this->createColumn("created_at", "date", "null");
        $this->createColumn("updated_at", "date", "null");
        
        $this->createTable();
    }
    public function getSource() {
        return "sets";
    }

    public function start() {

    }
}