<?php

namespace MyApp\Controller;

use Exception;
use MyApp\lib\View;
use MyApp\Model\Excercise;
use MyApp\Model\Person;
use MyApp\Model\Split;
use MyApp\Model\Training;
use MyApp\Controller\ControllerInterface;

class TrainingController extends Controller implements ControllerInterface
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
        $training = new Training();
        $trainingCollection = $training->find();

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection" => $trainingCollection]);
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
        $this->view->setData(["collection" => $personCollection, "collection2" => $splitCollection]);

        $user_id = "";
        $day = "";
        $excercise_id = "";
        $user_weight = "";
        $user_scope = "";
        $user_leg = "";
        $user_arm = "";

        if (isset($this->vars['user_id']) && isset($this->vars['split_id'])) {
            $excerciseCollection = $excercise->find("WHERE user_id = " . $this->vars['user_id'] . " AND split_id = " . $this->vars['split_id']);
            foreach ($excerciseCollection as $excercises) {
                try {
                    $training->setUser_id($this->vars['user_id']);
                    $training->setDay($this->vars['day']);
                    $training->setExcercise_id($excercises->id);
                    $training->setUser_weight($this->vars['user_weight']);
                    $training->setUser_scope($this->vars['user_scope']);
                    $training->setUser_leg($this->vars['user_leg']);
                    $training->setUser_arm($this->vars['user_arm']);
                    $training->save();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function trainingBearbeitenAction()
    {
        if (isset($this->vars['id']))
            $id = $this->vars['id'];

        $training = new Training();
        $trainingCollection = $training->findFirst($id);

        $excercise = new Excercise();
        $excerciseColl = $excercise->findFirst($trainingCollection->excercise_id);

        $person = new Person();
        $personCollection = $person->find();

        $split = new Split();
        $splitCollection = $split->find();

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection" => $personCollection,
            "collection2" => $splitCollection,
            "collection3" => $trainingCollection,
            "collection4" => $excerciseColl]);

        $user_id = "";
        $day = "";
        $excercise_id = "";
        $user_weight = "";
        $user_scope = "";
        $user_leg = "";
        $user_arm = "";

        if (isset($this->vars['user_id']) && isset($this->vars['split_id'])) {
            $excerciseCollection = $excercise->find("WHERE user_id = " . $this->vars['user_id'] . " AND split_id = " . $this->vars['split_id']);
            foreach ($excerciseCollection as $excercises) {
                try {
                    $training->setUser_id($this->vars['user_id']);
                    $training->setDay($this->vars['day']);
                    $training->setExcercise_id($excercises->id);
                    $training->setUser_weight($this->vars['user_weight']);
                    $training->setUser_scope($this->vars['user_scope']);
                    $training->setUser_leg($this->vars['user_leg']);
                    $training->setUser_arm($this->vars['user_arm']);
                    $training->save($id);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function trainingDeleteAction()
    {
        $id = "";
        $training = new Training();

        if (isset($this->vars['id'])) {
            $id = $this->vars['id'];
            $training->delete($id);
        }
    }
}