<?php

namespace MyApp\Controller;

use MyApp\Model\Split;
use Exception;
use MyApp\lib\View;

class SplitController implements Controller
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
        $split = new Split();
        $splitCollection = $split->find();
        
        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection"=>$splitCollection]);
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