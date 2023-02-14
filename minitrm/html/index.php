<?php
include("../mysql/datenbank.php");
include("../oop/Person.php");
include("../oop/Bestellung.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mini CRM</title>
    </head>
    <body>
        <div id="ueberschrift">
            <h2>
                Bestellungen
            </h2>
        </div>
        <div id="liste">
            <table border="1">
                <tr>
                    <td>Vorname</td>
                    <td>Nachname</td>
                    <td>Bestellung</td>
                </tr>
<?php
$liste = new Person();

$personen = $liste->get_personen($mysqli);

foreach ($personen AS $person) {
?>
                <tr>
                    <td><?php echo $person['0']; ?></td>
                    <td><?php echo $person['1']; ?></td>
                    <td><?php echo $person['2']; ?></td>
                    <td><a href="update.php?pers=<?php echo $person['4']; ?>&id=<?php echo $person['3']; ?>">bearbeiten</td>
                    <td><a href="delete.php?pers=<?php echo $person['4']; ?>&id=<?php echo $person['3']; ?>">l&ouml;schen</a>
                </tr>
<?php
}
?>
            </table>
        </div>
        <br><br>
        <div>
            <a href="pers_insert.php">Neue Person</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="best_insert.php">Neue Bestellung</a>
        </div>
    </body>
</html> 