if(isset($_POST['toevoegen'])){

$sql = "INSERT INTO producten(naam, prijs, voorraad)
VALUES(:naam,:prijs,:voorraad)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
':naam'=>$_POST['naam'],
':prijs'=>$_POST['prijs'],
':voorraad'=>$_POST['voorraad']
]);

}