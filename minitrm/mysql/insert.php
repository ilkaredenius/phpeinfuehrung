<?php
include("datenbank.php");

$sql = "INSERT INTO `personen` (`id`, `vorname`, `nachname`) VALUES (NULL, '" . $_POST['vorname'] . "','" . $_POST['nachname'] ."' )";
$mysqli->query($sql);
$lastid = $mysqli->insert_id;
echo $lastid;

$sql = "INSERT INTO `bestellungen` (`id`, `personen_id`, `bestellung`) VALUES (NULL, " . $lastid . ", '" . $_POST['bestellung'] . "')";
echo $sql;
$mysqli->query($sql);
