<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>"thema name" kommentieren</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>

<?php
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['textarea'])) {
        $error = "Der Kommentar darf nicht leer sein!";
    }
}
?>

<body>
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
        <a href="ThemaErstellen.php">neues Thema erstellen</a>
    </li>
    <li>
        <a href="Anmelden.php">abmelden</a>
    </li>
</ul>

<div class="Textfeld">
    <h3>Kommentar:</h3>

    <!-- php einfügen -->

    <form method="post" action="Kommentar.php">
        Text:<br> <textarea rows="6" class="textarea" name="textarea"></textarea><br><br>
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