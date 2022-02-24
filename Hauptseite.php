<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hauptseite</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<div class="header">
    <h1 class="Überschrift center">
        Drohnenforum
    </h1>
</div>
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
    $numberof = 0;
    $con = new mysqli("localhost", "root", "", "Drohnen");
    if ($con->connect_error) {
        $error = "Du bist nicht mit der Datenbank verbunden";
    } else {
        $data = "SELECT * FROM Themen";
        $res = $con->query($data);
        if ($res->num_rows > 0) {
            while ($i = $res->fetch_assoc()) {
                $time = date('d.m.Y - H:i:s', $i['Zeitstempel']);
                $data2 = "SELECT * FROM Kommentare";
                $res2 = $con->query($data2);
                while ($j = $res2->fetch_assoc()) {
                    if ($j['Titel'] === $i['Titel']) {
                        $numberof ++;
                    }
                }
                echo "<div class='themen'>
                            <div class='abstandlinksrechts'>
                                <div class='wrapper'>
                                    <p>Beitrag von: $i[Benutzername]</p>
                                    <p>Datum und Uhrzeit: $time</p>
                                </div>
                                <div class='wrapper'> 
                                    <h3>Titel:</h3>
                                    <p class='textrechts'>Kommentare: $numberof</p>
                                </div>
                                <h3>
                                    <a class='black' href='Thema.php?thema=$i[Titel]&seite=0'>$i[Titel]</a>
                                </h3>
                            </div>    
                        </div>";
                $numberof = 0;
            }
        }
    }
    ?>
</div>


</body>
</html>