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
$con = new mysqli("localhost", "root", "", "Drohnen");
if ($con->connect_error) {
    $error = "Du bist nicht mit der Datenbank verbunden";
} else {
    if(isset($_GET['value'])) {
        if($_GET['value'] === '0') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST['textarea'])) {
                    $error = "Bitte fülle alle Felder aus!";
                } else {
                    $data = "UPDATE Themen SET Text = '$_POST[textarea]' WHERE Titel = '$_GET[thema]'";
                    $con->query($data);
                    $error = "Beitrag erfolgreich geändert";
                }
            }
        } else {
            $data = "DELETE FROM Themen WHERE Titel = '$_GET[thema]'";
            $con->query($data);
            $data = "DELETE FROM Kommentare WHERE Titel = '$_GET[thema]'";
            $con->query($data);
            header('location: EigeneThemen.php?gelöscht=');
        }
    }
}
$con->close();
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
        <a href="ThemaErstellen.php">neues Thema erstellen</a>
    </li>
    <li>
        <a href="Anmelden.php">abmelden</a>
    </li>
</ul>

<div class="Textfeld">
    <h3>Thema bearbeiten:</h3>
    <form method="post" action="ThemaÄndern.php?thema=<?php echo $_GET['thema'].'&value=0' ?>">
        <?php
            echo "<h3>Titel: $_GET[thema]</h3>";
        ?>
        Text:<br> <textarea rows="6" name="textarea" class="textarea"></textarea><br><br>
        <div class="red">
            <?php echo $error; ?>
        </div>
        <div class="wrapper">
            <div><a href="EigeneThemen.php">abbrechen</a></div>
            <div><input type="submit" value="absenden" class="absenden"></div>
        </div>
    </form>
    <br>
    <div class="textrechts">
        <a href="ThemaÄndern.php?thema=<?php echo $_GET['thema'].'&value=1' ?>">Beitrag löschen</a>
    </div>

</div>
</body>
</html>