<?php
include("../mysql/datenbank.php");
include("../oop/Person.php");

if (isset($_POST["neueperson"])) {
    $person1 = new Person();
    $person1->setVorname($_POST['vorname']);
    $person1->setNachname($_POST['nachname']);
    $person1->insertPerson($mysqli);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mini CRM</title>
    </head>
    <body>
<?php
if (isset($_POST["neueperson"])) {
?>
        <div id="ueberschrift">
            <h2>
                Der Datensatz wurde angelegt.
            </h2>
        </div>
        <div>
            <a href="liste.php">zur&uuml;ck</a>
        </div>
<?php
} else {
?>
        <form action="pers_insert.php" name="neueperson" method="post">
            <input type="hidden" name="neueperson" value="1">
            <div id="ueberschrift">
                <h2>
                    Neue Person
                </h2>
            </div>
            <div id="vorname">
                <h3>
                    Vorname
                </h3>
                <input type="text" name="vorname">
            </div>
            <div id="nachname">
                <h3>
                    Nachname
                </h3>
                <input type="text" name="nachname">
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