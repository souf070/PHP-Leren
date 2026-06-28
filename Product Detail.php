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

<!DOCTYPE html>

<html>

<head>

<title>Product detail</title>

</head>

<body>

<h2><?= htmlspecialchars($product['naam']); ?></h2>

<p>Prijs: €<?= $product['prijs']; ?></p>

<p>Voorraad: <?= $product['voorraad']; ?></p>

<p>Dit zijn de gegevens van het gekozen product.</p>

<a href="producten.php">Terug</a>

</body>

</html>