<?php
namespace MyApp\Controller;

use MyApp\lib\View;

interface ControllerInterface
{
    public function setView(View $view);

}