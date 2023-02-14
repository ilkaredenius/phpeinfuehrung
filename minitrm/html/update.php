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
    <body><?php
if (isset($_POST["update"])) {    
    $id = $_POST['id'];
    $best = $_POST['best'];

    $bestellung = new Bestellung();
    $bestellung->loadBestellung($mysqli, $best);

    $person = new Person();
    $person->load($id, $mysqli);
    $person->setVorname($_POST['vorname']);
    $person->setNachname($_POST['nachname']);
    $person->save($mysqli);
    
    $bestellung->setBestellung($_POST['bestellung']);
    $bestellung->save($mysqli);
?>
        <div id="ueberschrift">
            <h2>
                Der Datensatz wurde angepasst.
            </h2>
        </div>
        <div>
            <a href="index.php">zur&uuml;ck</a>
        </div>
<?php
} else {    
    $id = $_GET['pers'];
    $best = $_GET['id'];

    $bestellung = new Bestellung();
    $bestellung->loadBestellung($mysqli, $best);

    $person = new Person();
    $person->load($id, $mysqli);
?>
        <form action="update.php" name="update" method="post">
            <input type="hidden" name="update" value="1">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="best" value="<?php echo $best; ?>">
            <div id="ueberschrift">
                <h2>
                    Datensatz &auml;ndern
                </h2>
            </div>
            <div id="vorname">
                <h3>
                    Vorname
                </h3>
                <input type="text" name="vorname" value="<?php echo $person->getVorname(); ?>">
            </div>
            <div id="nachname">
                <h3>
                    Nachname
                </h3>
                <input type="text" name="nachname" value="<?php echo $person->getNachname(); ?>">
            </div>
            <div id="bestellung">
                <h3>
                    Bestellung
                </h3>
                <input type="text" name="bestellung" value="<?php echo $bestellung->getBestellung(); ?>">
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