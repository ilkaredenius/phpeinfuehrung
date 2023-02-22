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
//        var_dump($_GET);
        $excercise = new Excercise();
        $excerciseCollection = $excercise->find();
        
        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$excerciseCollection]);
    }

    public function excerciseAnlegenAction()
    {
//        var_dump($_POST);
        $excercise = new Excercise();
        $split = new Split();

        $splitCollection = $split->find();

        $person = new Person();
        $personCollection = $person->find();
        
        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$personCollection, "collection2"=>$splitCollection]);
        
        $alldataflag = true;

        if (!isset($_POST['split_id'])) {
            $alldataflag = false; echo "1";

        } else {
            $split_part_id = $_POST['split_id'];
        }

        if (!isset($_POST['user_id'])) {
            $alldataflag = false; echo "2";

        } else {
            $user_id = $_POST['user_id'];
        }

        if (!isset($_POST['name'])) {
            $alldataflag = false; echo "3";

        } else {
            $name = $_POST['name'];
        }

        if (!isset($_POST['number'])) {
            $alldataflag = false; echo "4";

        } else {
            $number = $_POST['number'];
        }

        if (!isset($_POST['sets'])) {
            $alldataflag = false; echo "5";

        } else {
            $sets = $_POST['sets'];
        }

        if (!isset($_POST['reps'])) {
            $alldataflag = false; echo "6";

        } else {
            $reps = $_POST['reps'];
        }

        if (!isset($_POST['sequence'])) {
            $alldataflag = false; echo "6";

        } else {
            $sequence = $_POST['sequence'];
        }
        if ($alldataflag == true) {
            echo"jaaaa";
        } else {
            echo "neee";
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