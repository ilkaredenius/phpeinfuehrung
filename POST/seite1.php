<?php
try {
    if (true) {
        throw new Exception("Keine Datenbankverbindung!");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>