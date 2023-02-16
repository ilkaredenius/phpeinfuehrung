<?php

spl_autoload_register(function ($class) {
    $prefix = 'Mvc\\';
    $base_dir = __DIR__ .'/';//. '/src/';

    //echo $class;
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
        //echo "asd";
    }
});

// get the requested url
$url      = (isset($_GET['_url']) ? $_GET['_url'] : '');
$urlParts = explode('/', $url);
 
// build the controller class
$controllerName      = (isset($urlParts[0]) && $urlParts[0] ? $urlParts[0] : 'index');
echo $controllerClassName = '\\Mvc\\Controller\\'.ucfirst($controllerName).'Controller';

$obj = new \Mvc\Controller\IndexController();
//var_dump($obj);

 
// build the action method
$actionName       = (isset($urlParts[1]) && $urlParts[1] ? $urlParts[1] : 'index');
$actionMethodName = ucfirst($actionName).'Action';
 
try {
   if (!class_exists($controllerClassName)) {
      //throw new \Mvc\Library\NotFoundException();
   }
 
   $controller = new $controllerClassName();
 
   if (!$controller instanceof \Mvc\Controller\Controller || !method_exists($controller, $actionMethodName)) {
     //throw new \Mvc\Library\NotFoundException();
   }
 
   $controller->$actionMethodName();
} catch (\Mvc\Library\NotFoundException $e) {
   http_response_code(404);
   echo 'Page not found: '.$controllerClassName.'::'.$actionMethodName;
} catch (\Exception $e) {
   http_response_code(500);
   echo 'Exception: '.$e->getMessage().' '.$e->getTraceAsString();
}
