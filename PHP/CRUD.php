<?php
require "db.php";


// ------------------
// PRODUCT TOEVOEGEN
// ------------------

if(isset($_POST['toevoegen'])){

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

    echo "Product toegevoegd.<br><br>";
}


// ------------------
// PRODUCT VERWIJDEREN
// ------------------

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $sql = "DELETE FROM producten WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    echo "Product verwijderd.<br><br>";
}


// ------------------
// PRODUCT WIJZIGEN OPSLAAN
// ------------------

if(isset($_POST['update'])){

    $sql = "UPDATE producten
            SET naam=:naam,
                prijs=:prijs,
                voorraad=:voorraad
            WHERE id=:id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':naam' => $_POST['naam'],
        ':prijs' => $_POST['prijs'],
        ':voorraad' => $_POST['voorraad'],
        ':id' => $_POST['id']
    ]);

    echo "Product gewijzigd.<br><br>";
}


// ------------------
// PRODUCT OPHALEN VOOR WIJZIGEN
// ------------------

$product = null;

if(isset($_GET['edit'])){

    $sql = "SELECT * FROM producten WHERE id=:id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $_GET['edit']
    ]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>



<h2>
<?php
if($product){
    echo "Product wijzigen";
}else{
    echo "Nieuw product";
}
?>
</h2>


<form method="post">

<?php
if($product){
?>

<input type="hidden" name="id" value="<?= $product['id']; ?>">

Naam:<br>
<input type="text" name="naam"
value="<?= $product['naam']; ?>"><br><br>

Prijs:<br>
<input type="number" step="0.01"
name="prijs"
value="<?= $product['prijs']; ?>"><br><br>

Voorraad:<br>
<input type="number"
name="voorraad"
value="<?= $product['voorraad']; ?>"><br><br>

<input type="submit"
name="update"
value="Wijzigen">

<?php
}else{
?>

Naam:<br>
<input type="text" name="naam"><br><br>

Prijs:<br>
<input type="number" step="0.01"
name="prijs"><br><br>

Voorraad:<br>
<input type="number"
name="voorraad"><br><br>

<input type="submit"
name="toevoegen"
value="Toevoegen">

<?php
}
?>

</form>

<hr>

<h2>Alle producten</h2>

<table border="1">

<tr>

<th>ID</th>
<th>Naam</th>
<th>Prijs</th>
<th>Voorraad</th>
<th>Acties</th>

</tr>

<?php

$sql = "SELECT * FROM producten";

$stmt = $pdo->query($sql);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['naam']; ?></td>

<td>€<?= $row['prijs']; ?></td>

<td><?= $row['voorraad']; ?></td>

<td>

<a href="?edit=<?= $row['id']; ?>">
Wijzigen
</a>

|

<a href="?delete=<?= $row['id']; ?>">
Verwijderen
</a>

</td>

</tr>

<?php
}
?>

</table>