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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nutzername'])) {
        $error = "Bitte gebe einen Nutzernamen ein";
    } else if (empty($_POST['passwort'])) {
        $error = "Bitte gebe ein Passwort ein";
    }
}
?>

<h1 class="Überschrift center">Willkommen auf dem Drohnenforum!</h1>

<div class="formular">
    <form method="post" action="Anmelden.php">
        Nutzername: <input type="text" name="nutzername"> <br> <br>
        Passwort: <input type="password" name="passwort"> <br> <br>
        <input type="submit" value="anmelden"> <br>
        <div class="red">
            <?php echo $error; ?>
        </div>
    </form>
    <p class="left">
        Noch nicht regristiert? <a href="Registrieren.php">Jetzt registrieren!</a>
    </p>
</div>

</body>
</html>