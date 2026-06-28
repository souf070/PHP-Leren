<?php
require "db.php";

$sql = "SELECT * FROM producten";
$stmt = $pdo->query($sql);

echo "<table border='1'>";
echo "<tr>
<th>ID</th>
<th>Naam</th>
<th>Prijs</th>
<th>Voorraad</th>
</tr>";

while($product = $stmt->fetch(PDO::FETCH_ASSOC)){

    echo "<tr>";

    echo "<td>".$product['id']."</td>";
    echo "<td>".$product['naam']."</td>";
    echo "<td>€ ".$product['prijs']."</td>";
    echo "<td>".$product['voorraad']."</td>";

    echo "</tr>";

}

echo "</table>";

?>