<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hauptseite</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<h1 class="Überschrift center">
    Drohnenforum
</h1>
<ul>
    <li>
        <a class="aktiv" href="Hauptseite.php">alle Themen</a>
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
    <?php
    $alleThemen = "";
    $con = new mysqli("localhost", "root", "", "Drohnen");
    if($con->connect_error) {
        $error = "Du bist nicht mit der Datenbank verbunden";
    } else {
        $data = "SELECT * FROM Themen";
        $res = $con->query($data);
        if ($res->num_rows > 0) {
            while ($i = $res->fetch_assoc()) {
                $alleThemen = $i['Titel'];
                echo "<h3><a href='Thema.php'>$alleThemen</a></h3> <br>";
            }
        }
    }
    ?>
</div>


</body>
</html>