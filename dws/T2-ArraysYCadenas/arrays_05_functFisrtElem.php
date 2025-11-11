<?php
/*Escribe una función llamada getFirstElement que reciba un array y devuelva el primer elemento.
Por ejemplo: getFirstElement([1, 2]);*/

function getFirstElement($array){
    return $array[0];
}

$array_numeros = [1,2,3,4];

echo getFirstElement($array_numeros);