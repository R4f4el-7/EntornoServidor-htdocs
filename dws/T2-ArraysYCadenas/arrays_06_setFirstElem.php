<?php
/*scribe una función llamada setFirstElement que reciba como parámetro de entrada un array y un valor cualquiera. 
El valor recibido debería reemplazar lo que haya en la primera posición del array. El array debería ser devuelto.

Ejemplo: setFirstElement([1, 2], 3); */
function setFirstElemtent($array, $num){
    $array[0] = $num;
    return $array;
}
function getLastElement($array){
    return $array[count($array)-1];
}

$array_numeros = array(4,5,9,1,2);

$nuevo_array = setFirstElemtent($array_numeros, 8);

for($i = 0; $i < count($nuevo_array); $i++){
    echo $nuevo_array[$i].",";
}

echo "El ultimo elemento del array es: ". getLastElement($nuevo_array);