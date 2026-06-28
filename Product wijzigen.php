if(isset($_POST['update'])){

$sql = "UPDATE producten
SET naam=:naam,
prijs=:prijs,
voorraad=:voorraad
WHERE id=:id";

$stmt = $pdo->prepare($sql);

$stmt->execute([

':naam'=>$_POST['naam'],
':prijs'=>$_POST['prijs'],
':voorraad'=>$_POST['voorraad'],
':id'=>$_POST['id']

]);

}