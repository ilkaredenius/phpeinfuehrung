<?php

namespace MyApp\Controller;

use MyApp\Model\Excercise;
use MyApp\Model\Split;
use MyApp\Model\Person;
use Exception;
use MyApp\lib\View;

class ExcerciseController implements Controller
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
        $excercise = new Excercise();
        $excerciseCollection = $excercise->find();
        
        //Datenübergabe an die View excercise/index.phtml
        $this->view->setData(["collection"=>$excerciseCollection]);
    }

    public function excerciseAnlegenAction()
    {
        $excercise = new Excercise();
        $split = new Split();

        $splitCollection = $split->find();

        if (isset($_GET['id'])) {
            //Datenübergabe an die View excercise/excerciseanlegen.phtml
            $excerciseCollectionFirst = $excercise->findFirst($_GET['id']);
        }

        $person = new Person();
        $personCollection = $person->find();

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$personCollection, "collection2"=>$splitCollection]);
        
        $alldataflag = true;
        if (!isset($_POST['split'])) {
            $alldataflag = false;

        } else {
            $split_part_id = $_POST['split'];
        }

        if (!isset($_POST['user'])) {
            $alldataflag = false;

        } else {
            $user_id = $_POST['user'];
        }

        if (!isset($_POST['name'])) {
            $alldataflag = false;

        } else {
            $name = $_POST['name'];
        }

        if (!isset($_POST['number'])) {
            $alldataflag = false;

        } else {
            $number = $_POST['number'];
        }

        if (!isset($_POST['sets'])) {
            $alldataflag = false;

        } else {
            $sets = $_POST['sets'];
        }

        if (!isset($_POST['reps'])) {
            $alldataflag = false;

        } else {
            $reps = $_POST['reps'];
        }

        if (!isset($_POST['sequence'])) {
            $alldataflag = false;

        } else {
            $sequence = $_POST['sequence'];
        }

        if ($alldataflag) {
            try {
                $excercise->setSplit_id($split_part_id);
                $excercise->setUser_id($user_id);
                $excercise->setName($name);
                $excercise->setNumber($number);
                $excercise->setSets($sets);
                $excercise->setReps($reps);
                $excercise->setSequence($sequence);
                $excercise->save();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function excerciseBearbeitenAction()
    {
        $excercise = new Excercise();
        $split = new Split();
        $person = new Person();

        if (isset($_GET['id']))
            $id = $_GET['id'];
        if (isset($_POST['id']))
            $id = $_POST['id'];

        $excerciseCollection = $excercise->findFirst($id);

        $personlist = $person->find();
        $person = $person->findFirst($excerciseCollection->user_id);

        $splitCollection = $split->find();

        if (isset($_GET['id'])) {
            //Datenübergabe an die View excercise/excerciseanlegen.phtml
            $excerciseCollectionFirst = $excercise->findFirst($_GET['id']);
        }

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["excercise"=>$excerciseCollection, 
                            "splits"=>$splitCollection, 
                            "person"=>$person, 
                            "personlist"=>$personlist]);
        
        $alldataflag = true;
        if (!isset($_POST['split'])) {
            $alldataflag = false;

        } else {
            $split_part_id = $_POST['split'];
        }

        if (!isset($_POST['user'])) {
            $alldataflag = false;

        } else {
            $user_id = $_POST['user'];
        }

        if (!isset($_POST['name'])) {
            $alldataflag = false;

        } else {
            $name = $_POST['name'];
        }

        if (!isset($_POST['number'])) {
            $alldataflag = false;

        } else {
            $number = $_POST['number'];
        }

        if (!isset($_POST['sets'])) {
            $alldataflag = false;

        } else {
            $sets = $_POST['sets'];
        }

        if (!isset($_POST['reps'])) {
            $alldataflag = false;

        } else {
            $reps = $_POST['reps'];
        }

        if (!isset($_POST['sequence'])) {
            $alldataflag = false;

        } else {
            $sequence = $_POST['sequence'];
        }

        if ($alldataflag) {
            try {
                $excercise->setId($id);
                $excercise->setSplit_id($split_part_id);
                $excercise->setUser_id($user_id);
                $excercise->setName($name);
                $excercise->setNumber($number);
                $excercise->setSets($sets);
                $excercise->setReps($reps);
                $excercise->setSequence($sequence);
                $excercise->save();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function excerciseDeleteAction()
    {
        $id = "";
        $excercise = new Excercise();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $excercise->delete($id);
        }
    }
}