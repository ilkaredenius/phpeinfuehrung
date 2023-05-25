<<<<<<< HEAD
Test!!!
<?php
=======
ivan ist coooool !!!!!!!


<?php

>>>>>>> 2b4dc2bae270d094133fb9ffd7c4f4ed76e9797b
/*
spl_autoload_register(function ($class) 
{
    $prefix = 'MyApp\\';

    $base_dir = __DIR__ .'/';

    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) 
    {
        return;
    }

    $relative_class = substr($class, $len);
    
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) 
    {
        require $file;
    }
});

$controllerName = ucfirst($_GET['controller']);

$actionName = ucfirst($_GET['action']);

$controllerClassName = '\\MyApp\\Controller\\'.ucfirst($_GET['controller']).'Controller';

$actionMethodName = ucfirst($_GET['action']).'Action'; 
 
$controller = new $controllerClassName();

$view = new \MyApp\lib\View(__DIR__.DIRECTORY_SEPARATOR.'view',  $actionName, $controllerName);

$controller->setView($view);
 
$controller->$actionMethodName();

$view->render();
<<<<<<< HEAD
*/
=======
*/
>>>>>>> 2b4dc2bae270d094133fb9ffd7c4f4ed76e9797b
