<?php

namespace MyApp\Controller;
use MyApp\lib\View;


class IndexController implements Controller
{
    protected $view;

    protected $vars;

    public function __construct()
    {
        
        $this-setData($_POST);

    }

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

    private function setData($arr)
    {
        foreach ($arr as $key=>$value) {
            $this->vars[$key] = $value;
        }
        return $this;
    }
}