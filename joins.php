<?php
$mysqli = new mysqli("localhost", "root", "", "minitrm");
$mysqli->select_db("minitrm");

//Right Join, alle von rechts
//$sql = "SELECT * FROM personen RIGHT JOIN bestellungen ON personen.id = bestellungen.personen_id";echo $sql;
//$result = $mysqli->query($sql);

//Inner Join, nur die, wo beide gefüllt sind
//$sql = "SELECT * FROM personen INNER JOIN bestellungen ON personen.id = bestellungen.personen_id";echo $sql;
//$result = $mysqli->query($sql);

//Left Join, alle von links
//$sql = "SELECT * FROM personen LEFT JOIN bestellungen ON personen.id = bestellungen.personen_id";echo $sql;
//$result = $mysqli->query($sql);

//Full Join, alle
//$sql = "SELECT * FROM personen FULL JOIN bestellungen ON personen.id = bestellungen.personen_id";echo $sql;
//$result = $mysqli->query($sql);

while ($kommentar = mysqli_fetch_assoc($result)) {
    echo $kommentar['vorname']." ".$kommentar['nachname']." schrieb:<br />";
    echo $kommentar['bestellung']."<br /><br />";
}