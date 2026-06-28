<?php
require "db.php";

if(isset($_POST['opslaan'])){

    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $voorraad = $_POST['voorraad'];

    $sql = "INSERT INTO producten (naam, prijs, voorraad)
            VALUES (:naam, :prijs, :voorraad)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':naam' => $naam,
        ':prijs' => $prijs,
        ':voorraad' => $voorraad
    ]);

    echo "Product succesvol toegevoegd.";
}
?>

<h2>Nieuw product</h2>

<form method="post">

Naam:<br>
<input type="text" name="naam" required><br><br>

Prijs:<br>
<input type="number" step="0.01" name="prijs" required><br><br>

Voorraad:<br>
<input type="number" name="voorraad" required><br><br>

<input type="submit" name="opslaan" value="Toevoegen">

</form>