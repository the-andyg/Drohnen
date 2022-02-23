<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>"thema name" kommentieren</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
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

    <form>
        Text:<br> <textarea rows="6" class="textarea"></textarea><br><br>
        <div class="wrapper">
            <div class="box1"><a href="Hauptseite.php">abbrechen</a></div>
            <div class="box2"><input type="submit" value="absenden" class="absenden"></div>
        </div>
    </form>
</div>
</body>
</html>