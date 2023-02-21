<?php

namespace MyApp\Controller;

use MyApp\Model\Training;
use Exception;

class TrainingController
{
    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //minitrm/index.php?controller=index&action=index&vorname=Ilka&nachname=Redenius
        var_dump($_GET);
        $training = new Training();
    }

    public function trainingAnlegenAction()
    {
        $training = new Training();

        $user_id = "";
        $day = "";
        $excercise_id = "";
        $user_weight = "";
        $user_scope = "";
        $user_leg = "";
        $user_arm = "";

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

    public function trainingDeleteAction()
    {
        $id = "";
        $training = new Training();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Training->delete($id);
        }
    }
}