<?php

$host = "localhost";
$dbnaam = "webshop_p04";
$gebruiker = "root";
$wachtwoord = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbnaam;charset=utf8",
        $gebruiker,
        $wachtwoord
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Verbinding gelukt";
}
catch(PDOException $e){
    echo "Fout: " . $e->getMessage();
}

?>