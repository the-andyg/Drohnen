<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thema "thema name"</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<?php
SESSION_START();
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['textarea'])) {
        $error = "Der Kommentar darf nicht leer sein!";
    } else {
        $con = new mysqli("localhost", "root", "", "Drohnen");
        if ($con->connect_error) {
            $error = "Du bist nicht mit der Datenbank verbunden";
        }
        if (empty($error)) {
            $sql = "INSERT INTO Kommentare(Titel, Kommentar, Benutzername) VALUES('$_GET[thema]', '$_POST[textarea]', '$_SESSION[Benutzername]')";
            $con->query($sql);
            $error = "Kommentar erfolgreich geteilt!";
        }
        $con->close();
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
        <a href="ThemaErstellen.php">neues Thema erstellen</a>
    </li>
    <li>
        <a href="Anmelden.php">abmelden</a>
    </li>
</ul>

<div class="Textfeld">

    <?php
    $con = new mysqli("localhost", "root", "", "Drohnen");
    $titel = $_GET["thema"];
    $link = "Thema.php".$titel;
    if ($_GET["seite"] === "eins") {
        $linkzuruck = "EigeneThemen.php";
    } else {
        $linkzuruck = "Hauptseite.php";
    }
    echo "<h2>Titel: $titel</h2>";
    $data = "SELECT * FROM themen";
    $res = $con->query($data);
    if ($res->num_rows > 0) {
        while ($i = $res->fetch_assoc()) {
            if ($i['Titel'] === $titel) {
                echo "<h4>Beitrag von: <p class='red'> $i[Benutzername] </p> </h4> <br> <p>$i[Text]</p> <br>";
            }
        }
    }
    ?>
    <h3>Kommentare:</h3>
    <?php
    $count = 0;
    $alleKommentare = "";
    if ($con->connect_error) {
        $error = "Du bist nicht mit der Datenbank verbunden";
    } else {
        $data = "SELECT * FROM kommentare";
        $res = $con->query($data);
        if ($res->num_rows > 0) {
            while ($i = $res->fetch_assoc()) {
                if ($i['Titel'] === $titel) {
                    $count++;
                    echo "<h4>Kommentar von: $i[Benutzername]</h4> <br> <p>$i[Kommentar]</p> <br>";
                }

            }
            if ($count === 0) {
                echo "<p>Keine Kommentare vorhanden. </p><br>";
            }
        }
    }
    ?>
    <form method="post">
        Kommentar hinzufügen:<br> <textarea rows="6" name="textarea" class="textarea"></textarea><br><br>
        <div class="red">
            <?php echo $error; ?>
        </div>
        <div class="wrapper">
            <div class="box1"><a href=<?php echo $linkzuruck ?>>zurück</a></div>
            <div class="box2"><input type="submit" value="absenden" class="absenden"></div>
        </div>
    </form>

</div>

</body>
</html>