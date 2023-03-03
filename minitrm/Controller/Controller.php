<?php
namespace MyApp\Controller;

use MyApp\lib\DB;

class Controller 
{
    protected $vars = [];

    public function __construct()
    {
        $this->magischeMethode();
    }

    public function magischeMethode()
    {
        //TODO wenn $_POST[name] == $_GET[name] 

        foreach ($_POST as $key=>$value) {
            $var = mysqli_real_escape_string(DB::getInstance()->getConnect(),$value);
            $this->vars[$key] = htmlspecialchars($value);
        }

        foreach ($_GET as $key=>$value) {
            $var = mysqli_real_escape_string(DB::getInstance()->getConnect(),$value);
            $this->vars[$key] = htmlspecialchars($value);        }
    }
}