<?php

namespace MyApp\Controller;

use MyApp\Model\Excercise;
use Exception;

class ExcerciseController
{
    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //minitrm/index.php?controller=index&action=index&vorname=Ilka&nachname=Redenius
        var_dump($_GET);
        $excercise = new Excercise();
    }

    public function excerciseAnlegenAction()
    {
        $excercise = new Excercise();

        $split_part_id = "";
        $user_id = "";
        $name = "";
        $number = "";
        $sets = "";
        $reps = "";
        $sequence = "";

        try {
            $excercise->setSplit_id($_GET['split']);
            $excercise->setUser_id($_GET['user']);
            $excercise->setName($_GET['name']);
            $excercise->setNumber($_GET['number']);
            $excercise->setSets($_GET['sets']);
            $excercise->setReps($_GET['reps']);
            $excercise->setSequence($_GET['sequence']);
            $excercise->save();
        } catch (Exception $e) {
            echo $e->getMessage();
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