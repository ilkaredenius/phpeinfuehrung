<?php
include("datenbank.php");
$_POST['id'] = 9;
$sql = "UPDATE `personen`
    SET `vorname` = '" . $_POST['vorname'] . "', 
    `nachname` = '" . $_POST['nachname'] . "'
    WHERE id = " . $_POST['id'];
$mysqli->query($sql);
echo $sql;