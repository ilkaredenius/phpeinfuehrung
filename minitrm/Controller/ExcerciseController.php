<?php

namespace MyApp\Controller;

use Exception;
use MyApp\lib\View;
use MyApp\Model\Excercise;
use MyApp\Model\Person;
use MyApp\Model\Split;
use MyApp\Controller\ControllerInterface;

class Controller {}
class ExcerciseController extends Controller implements ControllerInterface
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
        $this->view->setData(["collection" => $excerciseCollection]);
    }

    public function excerciseAnlegenAction()
    {
        $excercise = new Excercise();
        $split = new Split();

        $splitCollection = $split->find();

        if (isset($this->vars['id'])) {
            //Datenübergabe an die View excercise/excerciseanlegen.phtml
            $excerciseCollectionFirst = $excercise->findFirst($this->vars['id']);
        }

        $person = new Person();
        $personCollection = $person->find();

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection" => $personCollection, "collection2" => $splitCollection]);

        $alldataflag = true;
        if (!isset($this->vars['split'])) {
            $alldataflag = false;

        } else {
            $split_part_id = $this->vars['split'];
        }

        if (!isset($this->vars['user'])) {
            $alldataflag = false;

        } else {
            $user_id = $this->vars['user'];
        }

        if (!isset($this->vars['name'])) {
            $alldataflag = false;

        } else {
            $name = $this->vars['name'];
        }

        if (!isset($this->vars['number'])) {
            $alldataflag = false;

        } else {
            $number = $this->vars['number'];
        }

        if (!isset($this->vars['sets'])) {
            $alldataflag = false;

        } else {
            $sets = $this->vars['sets'];
        }

        if (!isset($this->vars['reps'])) {
            $alldataflag = false;

        } else {
            $reps = $this->vars['reps'];
        }

        if (!isset($this->vars['sequence'])) {
            $alldataflag = false;

        } else {
            $sequence = $this->vars['sequence'];
        }
echo"1";
        if ($alldataflag) {echo"2";
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

        $id = $this->vars['id'];

        $excerciseCollection = $excercise->findFirst($id);

        $personlist = $person->find();
        $person = $person->findFirst($excerciseCollection->user_id);

        $splitCollection = $split->find();

        if (isset($this->vars['id'])) {
            //Datenübergabe an die View excercise/excerciseanlegen.phtml
            $excerciseCollectionFirst = $excercise->findFirst($this->vars['id']);
        }

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["excercise" => $excerciseCollection,
            "splits" => $splitCollection,
            "person" => $person,
            "personlist" => $personlist]);

        $alldataflag = true;
        if (!isset($this->vars['split'])) {
            $alldataflag = false;

        } else {
            $split_part_id = $this->vars['split'];
        }

        if (!isset($this->vars['user'])) {
            $alldataflag = false;

        } else {
            $user_id = $this->vars['user'];
        }

        if (!isset($this->vars['name'])) {
            $alldataflag = false;

        } else {
            $name = $this->vars['name'];
        }

        if (!isset($this->vars['number'])) {
            $alldataflag = false;

        } else {
            $number = $this->vars['number'];
        }

        if (!isset($this->vars['sets'])) {
            $alldataflag = false;

        } else {
            $sets = $this->vars['sets'];
        }

        if (!isset($this->vars['reps'])) {
            $alldataflag = false;

        } else {
            $reps = $this->vars['reps'];
        }

        if (!isset($this->vars['sequence'])) {
            $alldataflag = false;

        } else {
            $sequence = $this->vars['sequence'];
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
                $excercise->save($id);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function excerciseDeleteAction()
    {
        $id = "";
        $excercise = new Excercise();

        if (isset($this->vars['id'])) {
            $id = $this->vars['id'];
            $excercise->delete($id);
        }
    }
}