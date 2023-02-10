<?php
include("../mysql/datenbank.php");

if ($_GET['id'] != "") {
    $sql = "DELETE FROM bestellungen WHERE id = " . $_GET['id'];
    $result = $mysqli->query($sql);
} else {
    $sql = "DELETE FROM personen WHERE id = " . $_GET['pers'];
    $result = $mysqli->query($sql);
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
    </body>
</html>