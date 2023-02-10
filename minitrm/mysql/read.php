<?php
include("datenbank.php");
include("../oop/Person.php");
include("../oop/Bestellung.php");

//Right Join, alle von rechts
//$sql = "SELECT * FROM personen RIGHT JOIN bestellungen ON personen.id = bestellungen.personen_id";echo $sql;
//$result = $mysqli->query($sql);

//Inner Join, nur die, wo beide gefüllt sind
//$sql = "SELECT * FROM personen INNER JOIN bestellungen ON personen.id = bestellungen.personen_id";echo $sql;
//$result = $mysqli->query($sql);

//Left Join, alle von links
//$sql = "SELECT * FROM personen LEFT JOIN bestellungen ON personen.id = bestellungen.personen_id";echo $sql;
//$result = $mysqli->query($sql);

$_POST['id'] = 12;

$person1 = new Person();
$person1->load($_POST['id'], $mysqli);
echo $person1->getVorname();
$person1->setVorname("Ivan");
echo $person1->getVorname();
$person1->save($mysqli);

$bestellung1 = new Bestellung();
$bestellung1->load($_POST['id'], $mysqli);
echo $bestellung1->getBestellung();
$bestellung1->setBestellung("11");
echo $bestellung1->getBestellung();
$bestellung1->save($mysqli);
