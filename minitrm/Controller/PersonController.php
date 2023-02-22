<?php

namespace MyApp\Controller;

use MyApp\Model\Person;
use Exception;
use MyApp\lib\View;

class PersonController implements Controller
{
    protected $view;

    public function setView(View $view)
    {
        $this->view = $view;
    }

    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //minitrm/index.php?controller=index&action=index&vorname=Ilka&nachname=Redenius
//        var_dump($_GET);
        $person = new Person();
        $personCollection = $person->find();
        
        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$personCollection]);
    //    var_dump($personen);
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