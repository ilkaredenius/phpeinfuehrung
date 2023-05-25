<?php

namespace MyApp\Controller;

use Exception;
use MyApp\lib\View;
use MyApp\Model\Excercise;
use MyApp\Model\Sets;
use MyApp\Model\Training;
use MyApp\Controller\ControllerInterface;


class SetsController extends Controller implements ControllerInterface
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
        $this->view->setData(["collection" => $setsCollection]);
    }

    public function setsAnlegenAction()
    {
        if (isset($this->vars['user_id']))
            $user = $this->vars['user_id'];
        if (isset($this->vars['day']))
            $day = $this->vars['day'];
        $sets = new Sets();
        $setsCollection = $sets->find();

        //Datenübergabe an die View sets/index.phtml
        $this->view->setData(["collection" => $setsCollection]);

        //TODO Sets laden
    //  $setsCollectionTraining = $sets->find("WHERE training_id = ");

        $excerciseCollection = array();
        $training = new Training();
        $trainingCollection = $training->find("WHERE user_id = " . $user . " AND day = '" . $day . "'");

        foreach ($trainingCollection as $train) {
            $excercise = new Excercise();
            $excerciseCollection[] = $excercise->findFirst($train->excercise_id);
        }

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection" => $excerciseCollection, "collection2" => $trainingCollection, "user" => $user, "day" => $day]);

        $weight = 0;
        foreach ($this->vars as $key => $value) {
            if ($key == "action") continue;
            if ($key == "controller") continue;

            $arr = explode("-", $key);
            if ($arr[0] == "weight") {
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
        $id = $this->vars['id'];

        $sets = new Sets();
        $setsCollection = $sets->findFirst($id);

        //Datenübergabe an die View sets/index.phtml
        $this->view->setData(["collection" => $setsCollection]);

        $training = new Training();
        $setsCollectionTraining = $training->findFirst($setsCollection->training_id);

        $excerciseCollection = array();
        $training = new Training();
        $trainingCollection = $training->find("WHERE user_id = " . $setsCollectionTraining->user_id . " AND day = " . $setsCollectionTraining->day);

        foreach ($trainingCollection as $train) {
            $excercise = new Excercise();
            $excerciseCollection[] = $excercise->findFirst($train->excercise_id);
        }

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collectionex" => $excerciseCollection, "collection2" => $trainingCollection]);

        $weight = 0;
        foreach ($this->vars as $key => $value) {
            if ($key == "action") continue;
            if ($key == "controller") continue;

            $arr = explode("-", $key);
            if ($arr[0] == "weight") {
                $weight = $value;
                continue;
            }

            try {
                $sets->setTraining_id($arr[0]);
                $sets->setWeight($weight);
                $sets->setRepetitions($value);
                $sets->save($id);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function setsDeleteAction()
    {
        $id = "";
        $sets = new Sets();

        if (isset($this->vars['id'])) {
            $id = $this->vars['id'];
            $sets->delete($id);
        }
    }
}