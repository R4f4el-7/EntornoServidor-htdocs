<?php
//Crea una función toArray que reciba dos valores y devuelva un array con estos dos valores.
function toArray($valor1, $valor2) {
    return [$valor1, $valor2];
}
$resultado = toArray("manzana", "pera");
print_r($resultado);