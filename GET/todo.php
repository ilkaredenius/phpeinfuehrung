<?php
$_GET['email'] = trim($_GET['email']);
foreach($_GET as $key=>$value)
{
    print_r($key . " -> " . $value . "<br>");
}

if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format<br>";
}

$newemail = str_split($_GET['email']);
print_r($newemail);
echo "<br>";

$rewemail = array_reverse($newemail);
print_r($rewemail);
echo "<br>";

$trennemail = preg_split("/[@.]+/", $_GET['email']);
print_r($trennemail);