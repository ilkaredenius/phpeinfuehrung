<?php
namespace MyApp\Migrations;

//use Exception;
//use MyApp\lib\DB;
//use MyApp\MigrationDB;

class Test extends \MyApp\Migrations\MigrationDB {
    public function __construct() {
        $this->createColumn("id", "int(11)", "null");
        $this->createColumn("user_id", "int(11)", "not null");
        $this->createColumn("day", "date", "null");
        $this->createColumn("excercise_id", "int(11)", "null");
        $this->createColumn("user_weight", "int(11)", "not null");
        $this->createColumn("user_scope", "int(11)", "null");
        $this->createColumn("user_leg", "double", "null");
        $this->createColumn("user_arm", "double", "not null");
        $this->createColumn("created_at", "date", "null");
        $this->createColumn("updated_at", "date", "null");
    }
    public function getSource() {
        return "training";
    }

    public function start() {

    }
}