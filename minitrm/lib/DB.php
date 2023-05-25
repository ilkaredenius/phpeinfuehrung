<?php
namespace MyApp\lib;

use mysqli;
use Exception;

final class DB {
    private static ?DB $instance = null;
    protected $mysqli;

    public static function getInstance(): DB
    {
        if (self::$instance === null) {

            self::$instance = new self();

        }

        return self::$instance;
    }
    public function getConnect() {
        try {
            //TODO notwendig?
            //TODO config files schreiben
            $this->mysqli = new mysqli("localhost", "root", "", "training");
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }

        try {
            $this->mysqli->select_db("training");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$this->mysqli) {
            throw new Exception("Keine Datenbank!");
        }
        return $this->mysqli;
    }
}