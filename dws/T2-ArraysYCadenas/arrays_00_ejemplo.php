<?php
//Dos formas de declarar el array
$colores = ["Rojo", "Verde", "Azul"];
// o también:
$colores = array("Rojo", "Verde", "Azul");
//colores es una ARRAY INDEXADO(numerico, empezando desde 0)
echo $colores[0];

//ARRAY ASOCIATIVO - Las claves son texto (strings), no números.
$persona = [
    "nombre" => "Carlos",
    "edad" => 25,
    "ciudad" => "Madrid"
];

echo $persona["nombre"]; // Muestra "Carlos"

//Se pueden recorrer 
//For para arrays indexados
$colores = ["Rojo", "Verde", "Azul"];

for ($i = 0; $i < count($colores); $i++) {
    echo $colores[$i] . "<br>";
}
//Foreach para cualquier array
$persona = [
    "nombre" => "Carlos",
    "edad" => 25,
    "ciudad" => "Madrid"
];

foreach ($persona as $clave => $valor) {
    echo "$clave: $valor<br>";
}