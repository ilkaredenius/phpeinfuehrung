<?php
namespace MyApp\lib;

class View
{
    public $actionName;

    public $controllerName;

    public $path;

    public function __construct($path, $actionName, $controllerName)
    {
        $this->path = $path;
        $this->actionName = $actionName;
        $this->controllerName = $controllerName;

    }

    public function render()
    {
       $file = $this->path.DIRECTORY_SEPARATOR.strtolower($this->controllerName).DIRECTORY_SEPARATOR.strtolower($this->actionName).'.phtml';

        
        include $file;

    }

}