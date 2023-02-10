<?php
include("../mysql/datenbank.php");

$sql = "SELECT *, bestellungen.id AS best_id, personen.id AS pers_id FROM personen LEFT JOIN bestellungen
         ON personen.id = bestellungen.personen_id";
$result = $mysqli->query($sql);
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
while ($liste = mysqli_fetch_assoc($result)) {
?>
                <tr>
                    <td><?php echo $liste['vorname'] ?></td>
                    <td><?php echo $liste['nachname'] ?></td>
                    <td><?php echo $liste['bestellung'] ?></td>
                    <td><a href="delete.php?pers=<?php echo $liste['pers_id']; ?>&id=<?php echo $liste['best_id'] ?>">l&ouml;schen</a>
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