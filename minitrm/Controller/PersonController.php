<?php

namespace MyApp\Controller;

use MyApp\Model\Person;
use Exception;

class PersonController
{
    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //minitrm/index.php?controller=index&action=index&vorname=Ilka&nachname=Redenius
        var_dump($_GET);
        $person = new Person();
    }

    public function personAnlegenAction()
    {
        $vorname = "";
        $nachname = "";
        $person = new Person();
        
        if (isset($_GET['vorname'])) {
            $vorname = $_GET['vorname'];
        }

        if (isset($_GET['nachname'])) {
            $nachname = $_GET['nachname'];
        }

        try {
            $person->setVorname($vorname);
            $person->setNachname($nachname);
            $person->setCreated_at(date("Y-m-d"));
            $person->setUpdated_at(date("Y-m-d"));
            $person->save();
        }  catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function personDeleteAction()
    {
        $id = "";
        $person = new Person();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $person->delete($id);
        }
    }

    
}