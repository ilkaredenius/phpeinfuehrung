<?php
foreach($_POST as $key=>$value)
{
    print_r($key . " -> " . $value . "<br>");
}

if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format<br>";
}