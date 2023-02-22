<?php

namespace MyApp\Controller;

use MyApp\Model\Sets;
use Exception;
use MyApp\lib\View;

class SetsController implements Controller
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
        $sets = new Sets();
        $setsCollection = $sets->find();
        
        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$setsCollection]);
    }

    public function setsAnlegenAction()
    {
        $sets = new Sets();

        $training_id = "";
        $weight = "";
        $repetitions = "";

        try {
            $sets->setTraining_id($_GET['training_id']);
            $sets->setWeight($_GET['weight']);
            $sets->setRepetitions($_GET['repetitions']);
            $sets->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function setsDeleteAction()
    {
        $id = "";
        $sets = new Sets();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sets->delete($id);
        }
    }
}