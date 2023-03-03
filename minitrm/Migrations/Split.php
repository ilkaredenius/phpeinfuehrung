<?php
namespace MyApp\Migrations;

//use Exception;
//use MyApp\lib\DB;
//use MyApp\MigrationDB;

class Test extends \MyApp\Migrations\MigrationDB {
    public function __construct() {
        $this->createColumn("id", "int(11)", "null");
        $this->createColumn("name", "int(11)", "not null");
        $this->createColumn("part", "int(11)", "null");
        $this->createColumn("created_at", "date", "null");
        $this->createColumn("updated_at", "date", "null");
    }
    public function getSource() {
        return "split";
    }

    public function start() {

    }
}