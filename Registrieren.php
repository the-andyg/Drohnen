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
    if (empty($_POST['nutzername'])) {
        $error = "Bitte gebe einen Nutzernamen ein";
    } else if (empty($_POST['passwort'])) {
        $error = "Bitte gebe ein Passwort ein";
    } else if (empty($_POST['passwort2'])) {
        $error = "Bitte gebe ein Passwort ein";
    }
}
?>

<h1 class="Überschrift center">Willkommen auf dem Drohnenforum!</h1>

<div class="formular">
    <form action="Registrieren.php" method="post">
        Nutzername: <input type="text" name="nutzername"> <br> <br>
        Passwort: <input type="password" name="passwort"> <br> <br>
        Passwort wiederholen: <input type="password" name="passwort2"> <br> <br>
        <?php echo $error; ?>
        <div class="wrapper">
            <a href="Anmelden.php">zurück</a>
            <input type="submit" value="registrieren">
        </div>
    </form>
</div>

</body>
</html>