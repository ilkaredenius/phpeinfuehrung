<?php
require("header.html");
?>
<header class="oben">
<h1 class="kontakt">Kontakt</h1>
</header>
<center>
<section>
    <form action="kontakt.php">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" class="langertext"></td>
            </tr>
            <tr>
                <td>E-Mail:</td>
                <td><input type="text" name="email" class="langertext"></td>
            </tr>
            <tr>
                <td>Strasse:</td>
                <td><input type="text" name="strasse" class="langertext"></td>
            </tr>
            <tr>
                <td>PLZ Ort:</td>
                <td><input type="text" name="plz" class="kurzertext"><input type="text" name="ort" class="normaltext"></td>
            </tr>
            <tr>
                <td>Passwort:</td>
                <td><input type="password" name="passwort" class="langertext"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="abschicken" value="absenden">
                </td>
            </tr>
        </table>
    </form>
</section>
</center>
<?php
require("footer.html");
?>