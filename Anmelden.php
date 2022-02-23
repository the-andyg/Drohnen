<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drohnen Forum</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<?php
$error = "";
$link = "Anmelden.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nutzername']) or empty($_POST['passwort'])) {
        $error = "Bitte gebe einen Nutzernamen ein";
    } else {
        $con = new mysqli("localhost", "root", "", "Drohnen");
        if ($con->connect_error) {
            $error = "Du bist nicht mit der Datenbank verbunden";
        } else {
            $data = "SELECT * FROM Nutzerdaten";
            $res = $con->query($data);
            if ($res->num_rows > 0) {
                while ($i = $res->fetch_assoc()) {
                    if ($_POST['nutzername'] === $i['Benutzername'] and $_POST['passwort'] === $i['Passwort']) {
                        header('location: Hauptseite.php');
                        $sql = "INSERT INTO eingeloggtenutzer(Benutzername) VALUES('$_POST[nutzername]')";
                        $con->query($sql);
                    }
                }
            }
            if (empty($error)) {
                $error = "nicht erfolgreich";
            }
        }
        $con->close();
    }
}

?>

<h1 class="Überschrift center">Willkommen auf dem Drohnenforum!</h1>

<div class="formular">
    <form method="post" action="Anmelden.php">
        Nutzername: <input type="text" name="nutzername"> <br> <br>
        Passwort: <input type="password" name="passwort"> <br> <br>
        <input type="submit" value="anmelden"> <br>
    </form>
    <div class="red">
        <?php echo $error; ?>
    </div>
    <p class="left">
        Noch nicht regristiert? <a href="Registrieren.php">Jetzt registrieren!</a>
    </p>
</div>

</body>
</html>