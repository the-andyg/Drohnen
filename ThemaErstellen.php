<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Neues Thema</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<?php
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['titel'])) {
        $error = "Bitte gebe einen Titel ein";
    } else if (empty($_POST['textarea'])) {
        $error = "Bitte gebe einen Text ein";
    }
}
?>

<h1 class="Überschrift center">
    Drohnenforum
</h1>
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