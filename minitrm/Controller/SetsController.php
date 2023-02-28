<?php

namespace MyApp\Controller;

use MyApp\Model\Sets;
use MyApp\Model\Training;
use MyApp\Model\Excercise;
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
        $sets = new Sets();
        $setsCollection = $sets->find();

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$setsCollection]);
    }

    public function setsAnlegenAction()
    {
        $sets = new Sets();
        $setsCollection = $sets->find();

        //Datenübergabe an die View sets/index.phtml
        $this->view->setData(["collection"=>$setsCollection]);

        //TODO Sets laden
        $setsCollectionTraining = $sets->find("WHERE training_id = ");

        $excerciseCollection = array();
        $training = new Training();
        $trainingCollection = $training->find("WHERE user_id = " . $_GET['user'] . " AND day = " . $_GET['day']);

        foreach ($trainingCollection as $train) {
            $excercise = new Excercise();
            $excerciseCollection[] = $excercise->findFirst($train->excercise_id);
        }

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$excerciseCollection, "collection2"=>$trainingCollection]);

        $weight = 0;
        foreach ($_POST as $key=>$value) {
            if ($key == "action") continue;
            if ($key == "controller") continue;
           
            $arr = explode ("-", $key);
            if ($arr[0] == "weight"){ 
                $weight = $value;
                continue;
            }

            try {
                $sets->setTraining_id($arr[0]);
                $sets->setWeight($weight);
                $sets->setRepetitions($value);
                $sets->save();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function setsBearbeitenAction()
    {
        if (isset($_GET['id']))
            $id = $_GET['id'];
        if (isset($_POST['id']))
            $id = $_POST['id'];

        $sets = new Sets();
        $setsCollection = $sets->findFirst($id);

        //Datenübergabe an die View sets/index.phtml
        $this->view->setData(["collection"=>$setsCollection]);

        //TODO Sets laden
        $setsCollectionTraining = $sets->find("WHERE id = " . $id);

        $excerciseCollection = array();
        $training = new Training();
        $trainingCollection = $training->find("WHERE user_id = " . $_GET['user'] . " AND day = " . $_GET['day']);

        foreach ($trainingCollection as $train) {
            $excercise = new Excercise();
            $excerciseCollection[] = $excercise->findFirst($train->excercise_id);
        }

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collectionex"=>$excerciseCollection, "collection2"=>$trainingCollection]);

        $weight = 0;
        foreach ($_POST as $key=>$value) {
            if ($key == "action") continue;
            if ($key == "controller") continue;

            $arr = explode ("-", $key);
            if ($arr[0] == "weight"){
                $weight = $value;
                continue;
            }

            try {
                $sets->setTraining_id($arr[0]);
                $sets->setWeight($weight);
                $sets->setRepetitions($value);
                $sets->save();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
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