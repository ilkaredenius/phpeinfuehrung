<?php

namespace MyApp\Controller;

use MyApp\Model\Training;
use MyApp\Model\Person;
use MyApp\Model\Excercise;
use MyApp\Model\Split;
use Exception;
use MyApp\lib\View;

class TrainingController implements Controller
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
        $training = new Training();
        $trainingCollection = $training->find();
        
        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$trainingCollection]);
    }

    public function trainingAnlegenAction()
    {
        $training = new Training();

        $excercise = new Excercise();

        $person = new Person();
        $personCollection = $person->find();

        $split = new Split();
        $splitCollection = $split->find();
        
        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$personCollection, "collection2"=>$splitCollection]);

        $user_id = "";
        $day = "";
        $excercise_id = "";
        $user_weight = "";
        $user_scope = "";
        $user_leg = "";
        $user_arm = "";

        if (isset($_POST['user_id']) && isset($_POST['split_id'])) {
            $excerciseCollection = $excercise->find("WHERE user_id = " . $_POST['user_id'] . " AND split_id = " . $_POST['split_id']);
            
            try {
                $training->setUser_id($_GET['user_id']);
                $training->setDay($_GET['day']);
                $training->setExcercise_id($_GET['excercise_id']);
                $training->setUser_weight($_GET['user_weight']);
                $training->setUser_scope($_GET['user_scope']);
                $training->setUser_leg($_GET['user_leg']);
                $training->setUser_arm($_GET['user_arm']);
                $training->save();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function trainingDeleteAction()
    {
        $id = "";
        $training = new Training();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $training->delete($id);
        }
    }
}