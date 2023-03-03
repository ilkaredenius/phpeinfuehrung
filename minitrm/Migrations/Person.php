<?php
namespace MyApp\Migrations;

//use Exception;
//use MyApp\lib\DB;
//use MyApp\MigrationDB;

class Test extends \MyApp\Migrations\MigrationDB {
    public function __construct() {
        $this->createColumn("id", "int(11)", "null");
        $this->createColumn("firstname", "varchar(255)", "not null");
        $this->createColumn("lastname", "varchar(255)", "null");
        $this->createColumn("email", "varchar(255)", "null");
        $this->createColumn("password", "varchar(255)", "not null");
        $this->createColumn("created_at", "date", "null");
        $this->createColumn("updated_at", "date", "null");
        $this->createTable();
    }
    public function getSource() {
        return "person";
    }

    public function start() {

    }
}