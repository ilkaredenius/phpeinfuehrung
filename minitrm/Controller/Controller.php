<?php

namespace MyApp\Controller;

interface Controller
{
    public function setView(\MyApp\lib\View $view);

    public function getData($data);

}