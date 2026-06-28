Basisvorm

<?php

function begroeting() {
    echo "Welkom!";
}

begroeting();

?>

Functie met parameter

<?php

function begroet($naam) {
    echo "Welkom, $naam!";
}

begroet("Ahmed");

?>

Functie die een waarde teruggeeft (Return)

<?php

function optellen($a, $b) {
    return $a + $b;
}

$resultaat = optellen(5, 3);

echo $resultaat;

?>

Functies met meerdere parameters

<?php

function product($naam, $prijs) {
    echo "Product: $naam <br>";
    echo "Prijs: €$prijs";
}

product("Laptop", 799.99);

?>

Goed voorbeeld

<?php

function toonProduct($naam, $prijs, $voorraad) {
    echo "<p>";
    echo "Naam: $naam <br>";
    echo "Prijs: €$prijs <br>";
    echo "Voorraad: $voorraad";
    echo "</p>";
}

toonProduct("Muis", 19.95, 10);

?>