<?php

namespace MyApp\Controller;

use MyApp\Model\Person;

class IndexController
{
    public function indexAction()
    {
        //request this controller from postman with: minitrm/index.php?controller=index&action=index&test=123
        var_dump($_GET['test']);
        $person = new Person();
    }
}