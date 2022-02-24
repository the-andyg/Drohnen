<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrieren</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<?php
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nutzername']) or empty($_POST['passwort']) or empty($_POST['passwort2'])) {
        $error = "Bitte fülle alle Felder aus";
    } else if ($_POST['passwort'] !== $_POST['passwort2']) {
        $error = "Die Passwörter sind nicht gleich!";
    } else {
        $con = new mysqli("localhost", "root", "", "Drohnen");
        if ($con->connect_error) {
            $error = "Du bist nicht mit der Datenbank verbunden";
        } else {
            $data = "SELECT * FROM Nutzerdaten";
            $res = $con->query($data);
            if ($res->num_rows > 0) {
                while ($i = $res->fetch_assoc()) {
                    if ($_POST['nutzername'] === $i['Benutzername']) {
                        $error = "Dieser Nutzername existiert bereits";
                    }
                }
            }
            if (empty($error)) {
                $sql = "INSERT INTO Nutzerdaten(Benutzername, Passwort) VALUES('$_POST[nutzername]', '$_POST[passwort]')";
                $con->query($sql);
                header('location: Anmelden.php?registrierung=');
            }
        }
        $con->close();
    }
}
?>

<h1 class="Überschrift center">Willkommen auf dem Drohnenforum!</h1>

<div class="formular">
    <form action="Registrieren.php" method="post">
        Nutzername: <input type="text" name="nutzername"> <br> <br>
        Passwort: <input type="password" name="passwort"> <br> <br>
        Passwort wiederholen: <input type="password" name="passwort2"> <br> <br>
        <div class="wrapper">
            <a href="Anmelden.php">zurück</a>
            <input type="submit" value="registrieren">
        </div>
        <div class="red">
            <?php echo $error; ?>
        </div>
    </form>
</div>

</body>
</html>