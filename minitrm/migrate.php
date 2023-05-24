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

use MyApp\Migrations\Test;

$test = new Test();

use MyApp\Migrations\Excercise;

$excesrsise = new Excercise();

use MyApp\Migrations\Person;

$person = new Excercise();