<?php
namespace MyApp\lib;

class View
{
    public $actionName;

    public $controllerName;

    public $path;

    protected $vars = [];

    public function __construct($path, $actionName, $controllerName)
    {
        $this->path = $path;
        $this->actionName = $actionName;
        $this->controllerName = $controllerName;

    }

    public function setData($arr)
    {
        foreach ($arr as $key=>$value) {
            $this->vars[$key] = $value;
        }
    }

    public function render()
    {
        $file = $this->path.DIRECTORY_SEPARATOR.strtolower($this->controllerName).DIRECTORY_SEPARATOR.strtolower($this->actionName).'.phtml';

        foreach ($this->vars as $key=>$value) {
            $$key = $value;
        }
        include $file;

    }

}