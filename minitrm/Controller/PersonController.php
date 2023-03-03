<?php

namespace MyApp\Controller;

use Exception;
use MyApp\lib\View;
use MyApp\Model\Person;
use MyApp\Controller\ControllerInterface;

class PersonController extends Controller implements ControllerInterface
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
        $person = new Person();
        $personCollection = $person->find();

        //Datenübergabe an die View person/index.phtml
        $this->view->setData(["collection" => $personCollection]);
    }

    public function personAnlegenAction()
    {
        $vorname = "";
        $nachname = "";
        $person = new Person();
        $person->debug();
        
        if (isset($this->vars['firstname'])) {
            $vorname = $this->vars['firstname'];
        }

        if (isset($this->vars['lastname'])) {
            $nachname = $this->vars['lastname'];
        }

        try {
            $person->setVorname($vorname);
            $person->setNachname($nachname);
            $person->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function personBearbeitenAction()
    {
        $vorname = "";
        $nachname = "";
        $id = $this->vars['id'];
        $person = new Person();

        $personCollect = $person->findFirst($this->vars['id']);
        $this->view->setData(["person" => $personCollect]);

        if (isset($this->vars['firstname'])) {
            $vorname = $this->vars['firstname'];
        }

        if (isset($this->vars['lastname'])) {
            $nachname = $this->vars['lastname'];
        }

        try {
            $person->setVorname($vorname);
            $person->setNachname($nachname);
            $person->save($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function personDeleteAction()
    {
        $id = "";
        $person = new Person();

        if (isset($this->vars['id'])) {
            $id = $this->vars['id'];
            $person->delete($id);
        }
    }
}