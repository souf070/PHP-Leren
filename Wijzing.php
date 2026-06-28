<?php
require "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM producten WHERE id=:id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
':id'=>$id
]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<form method="post" action="index.php">

<input type="hidden" name="id"
value="<?= $product['id']; ?>">

Naam:<br>

<input type="text"
name="naam"
value="<?= $product['naam']; ?>">

<br><br>

Prijs:<br>

<input type="number"
step="0.01"
name="prijs"
value="<?= $product['prijs']; ?>">

<br><br>

Voorraad:<br>

<input type="number"
name="voorraad"
value="<?= $product['voorraad']; ?>">

<br><br>

<input type="submit"
name="update"
value="Opslaan">

</form>