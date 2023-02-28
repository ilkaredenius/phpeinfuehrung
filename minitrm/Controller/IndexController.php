<?php

namespace MyApp\Controller;
use MyApp\lib\View;
use MyApp\Model\Person;


class IndexController implements Controller
{
    protected $view;

    public function setView(View $view)
    {
        $this->view = $view;
    }
    public function indexAction()
    {

        $person = new Person();
        $personCollection = $person->find();
        $this->view->setData(["collection"=>$personCollection]);

        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //var_dump($_GET['test']);
        //$person = new Person();
    }
}