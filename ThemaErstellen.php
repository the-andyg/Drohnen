<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Neues Thema</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<?php
SESSION_START();
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['titel']) or empty($_POST['textarea'])) {
        $error = "Bitte fülle alle Felder aus!";
    } else {
        $con = new mysqli("localhost", "root", "", "Drohnen");
        if ($con->connect_error) {
            $error = "Du bist nicht mit der Datenbank verbunden";
        } else {
            $data = "SELECT * FROM Themen";
            $res = $con->query($data);
            if ($res->num_rows > 0) {
                while ($i = $res->fetch_assoc()) {
                    if ($_POST['titel'] === $i['Titel']) {
                        $error = "Dieser Titel ist bereits vergeben";
                    }
                }
            }
            if (empty($error)) {
                $sql = "INSERT INTO Themen(Titel, Text, Benutzername) VALUES('$_POST[titel]', '$_POST[textarea]', '$_SESSION[Benutzername]')";
                $con->query($sql);
                $error = "Thema erfolgreich geteilt";
            }
        }

        $con->close();
    }
}
?>

<div class="header">
    <h1 class="Überschrift center">
        Drohnenforum
    </h1>
</div>

<ul>
    <li>
        <a href="Hauptseite.php">alle Themen</a>
    </li>
    <li>
        <a href="EigeneThemen.php">eigene Themen</a>
    </li>
    <li>
        <a class="aktiv" href="ThemaErstellen.php">neues Thema erstellen</a>
    </li>
    <li>
        <a href="Anmelden.php">abmelden</a>
    </li>
</ul>

<div class="Textfeld">
    <h3>Neues Thema:</h3>
    <form method="post" action="ThemaErstellen.php">
        Titel:<br> <input type="text" name="titel" class="textarea"><br><br>
        Text:<br> <textarea rows="6" name="textarea" class="textarea"></textarea><br><br>
        <div class="red">
            <?php echo $error; ?>
        </div>
        <div class="wrapper">
            <div class="box1"><a href="Hauptseite.php">abbrechen</a></div>
            <div class="box2"><input type="submit" value="absenden" class="absenden"></div>
        </div>
    </form>

</div>
</body>
</html>