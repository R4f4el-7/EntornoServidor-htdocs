<?php
$cosas = ["corazon", "cara sonriente", "sol"];
array_push($cosas, "fresas");// Añade elemento al final

foreach($cosas as $valor){
    echo $valor."<br>";
}
echo "----------------<br>";

array_pop($cosas); // Elimina el último elemento

foreach($cosas as $valor){
    echo $valor."<br>";
}
echo "----------------<br>";
//El siguiente método borra el elemento “sol”
unset($cosas[2]);

var_dump($cosas);

echo "<br>----------------<br>";
//longitud de array
$longitud = count($cosas);
echo "Longitud del array: ".$longitud;

echo "<br>----------------<br>";
//Array a texto
$array = array("afsdf", "asdf", "asdf", "asdf");
$txt = implode(", ", $array);//join
foreach($array as $valor){
    echo $valor.",";
} // "corazon, cara sonriente"

echo "<br>----------------<br>";
//Texto a array
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
foreach($pieces as $valor){
    echo $valor.",";
} // ["piece1", "piece2", "piece3", "piece4", "piece5", "piece6"]