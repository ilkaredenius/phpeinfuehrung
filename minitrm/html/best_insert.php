<?php
include("../mysql/datenbank.php");
include("../oop/Person.php");
include("../oop/Bestellung.php");

$personen = new Person();
$person = $personen->loadPersonen($mysqli);

if (isset($_POST["neuebestellung"])) {
    $bestellung = new Bestellung();
    $bestellung->load($_POST['person'], $mysqli);
    $bestellung->getBestellung();
    $bestellung->insertBestellung($mysqli);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mini CRM</title>
    </head>
    <body>
<?php
if (isset($_POST["neuebestellung"])) {
?>
        <div id="ueberschrift">
            <h2>
                Der Datensatz wurde angelegt.
            </h2>
        </div>
        <div>
            <a href="index.php">zur&uuml;ck</a>
        </div>
<?php
} else {
?>
        <form action="best_insert.php" name="neuebestellung" method="post">
            <input type="hidden" name="neuebestellung" value="1">
            <div id="ueberschrift">
                <h2>
                    Neuer Eintrag
                </h2>
            </div>
            <div id="person">
                <h3>
                    Person
                </h3>
                <select name="person">
                    <option>bitte ausw&auml;hlen</option>
<?php
foreach ($person AS $person1) {
?>
                    <option value="<?php echo $person1['0']; ?>"><?php echo $person1['1'] . " " . $person1['2']; ?></option>
<?php
}
?>
                </select>
            </div>
            <div id="bestellung">
                <h3>
                    Neue Bestellung
                </h3>
                <input type="text" name="bestellung">
            </div>
            <br>
            <div id="speichern">
                <input type="submit" value="speichern">
            </div>
        </form>
<?php
}
?>
    </body>
</html> 