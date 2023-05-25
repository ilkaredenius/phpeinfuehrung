<?php

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
    
    echo $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) 
    {
        require $file;
    }
});

<<<<<<< HEAD
use MyApp\Migrations\Training;

$excercise = new Training();
=======
use MyApp\Migrations\Test;

$test = new Test();

use MyApp\Migrations\Excercise;

$excesrsise = new Excercise();

use MyApp\Migrations\Person;

$person = new Excercise();
>>>>>>> 2b4dc2bae270d094133fb9ffd7c4f4ed76e9797b
