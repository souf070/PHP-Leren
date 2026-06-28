if(isset($_GET['delete'])){

$sql = "DELETE FROM producten WHERE id=:id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
':id'=>$_GET['delete']
]);

}