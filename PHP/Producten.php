<?php
require "db.php";

$sql = "SELECT * FROM producten";

$stmt = $pdo->query($sql);

echo "<table border='1'>";

echo "<tr>
<th>Naam</th>
<th>Prijs</th>
<th>Voorraad</th>
<th>Details</th>
</tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

echo "<tr>";

echo "<td>".$row['naam']."</td>";

echo "<td>".$row['prijs']."</td>";

echo "<td>".$row['voorraad']."</td>";

echo "<td>
<a href='product_detail.php?id=".$row['id']."'>
Bekijk details
</a>
</td>";

echo "</tr>";

}

echo "</table>";

?>