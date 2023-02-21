<?php

namespace MyApp\Controller;
use MyApp\lib\View;


class IndexController implements Controller
{
    protected $view;

    public function setView(View $view)
    {
        $this->view = $view;
    }
    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        //var_dump($_GET['test']);
        //$person = new Person();
    }
}