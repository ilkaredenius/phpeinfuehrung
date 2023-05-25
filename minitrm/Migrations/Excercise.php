<?php
namespace MyApp\Migrations;

require("MigrationDB.php");

class Excercise extends MigrationDB {
    public function __construct() {
        $this->createColumn("id", "int(11)", "null");
        $this->createColumn("split_id", "int(11)", "not null");
        $this->createColumn("user_id", "int(11)", "null");
        $this->createColumn("name", "varchar(255)", "null");
        $this->createColumn("number", "int(11)", "not null");
        $this->createColumn("sets", "int(11)", "null");
        $this->createColumn("reps", "int(11)", "null");
        $this->createColumn("sequence", "int(11)", "not null");
        $this->createColumn("created_at", "date", "null");
        $this->createColumn("updated_at", "date", "null");

        $this->createTable();
    }
    public function getSource() {
        return "excercise";
    }

    public function start() {

    }
}