$sql = "SELECT * FROM producten";

$stmt = $pdo->query($sql);

echo "<table border='1'>";

echo "<tr>
<th>ID</th>
<th>Naam</th>
<th>Prijs</th>
<th>Voorraad</th>
<th>Acties</th>
</tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['naam']."</td>";
echo "<td>".$row['prijs']."</td>";
echo "<td>".$row['voorraad']."</td>";

echo "<td>

<a href='wijzigen.php?id=".$row['id']."'>Wijzigen</a>

|

<a href='?delete=".$row['id']."'>Verwijderen</a>

</td>";

echo "</tr>";

}

echo "</table>";