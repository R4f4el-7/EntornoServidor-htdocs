<?php
//Recorrer la siguiente lista con un bucle imprimiendo el doble de cada número:$numbers = [1,9,3,8,5,7]
$array_numeros = [1,9,3,8,5,7];

foreach($array_numeros as $valor){
    echo ($valor*2)."<br>";
}

echo "--------------<br>";

for($i = 0; $i < count($array_numeros); $i++){
    echo ($array_numeros[$i]*2)."<br>"; 
}
