<?php
if (isset($_POST['naam'])) {
    $naam = $_POST['naam'];

    // Cookie blijft 1 uur geldig
    setcookie("naam", $naam, time() + 3600);

    // Pagina opnieuw laden zodat de cookie beschikbaar is
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookies</title>
</head>
<body>

<?php
if (isset($_COOKIE['naam'])) {
    echo "<h2>Welkom terug, " . htmlspecialchars($_COOKIE['naam']) . "!</h2>";
} else {
?>

<h2>Voer je naam in</h2>

<p>Wij slaan je naam op in een cookie zodat we je de volgende keer kunnen begroeten.</p>

<form method="post">
    Naam:
    <input type="text" name="naam" required>
    <input type="submit" value="Opslaan">
</form>

<?php
}
?>

</body>
</html>