<?php

namespace MyApp\Controller;

use MyApp\Model\Split;
use Exception;

class SplitController
{
    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //minitrm/index.php?controller=index&action=index&vorname=Ilka&nachname=Redenius
        var_dump($_GET);
        $split = new Split();
    }

    public function splitAnlegenAction()
    {
        //only executed during install
        $split = new Split();

        for ($n = 1; $n <= 7; $n++) {
            for ($i = 1; $i <= $n; $i++) {
                try {
                    $split->setPart($i);
                    $split->setName($n.'-split');
                    $split->save();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function splitDeleteAction()
    {
        $id = "";
        $split = new Split();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $split->delete($id);
        }
    }
}