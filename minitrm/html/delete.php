<?php
include("../mysql/datenbank.php");
include("../oop/Person.php");
include("../oop/Bestellung.php");

$bid = $_GET['id'];
$pid = $_GET['pers'];

if ($bid != "") {
    $bestellung1 = new Bestellung();
    $bestellung1->delete($id, $mysqli);

} else {
    $person1 = new Person();
    $person1->delete($pers, $mysqli);
}
?><!DOCTYPE html>
<html>
    <head>
        <title>Mini CRM</title>
    </head>
    <body>
        <div id="ueberschrift">
            Der Datensatz wurde gel&ouml;scht.
        </div>
        <div>
            <a href="index.php">zur&uuml;ck</a>
        </div>
    </body>
</html>