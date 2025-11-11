<?php
//Escribe un array de numeros y que luego muestre el máximo valor, el mínimo y las posiciones que ocupan en el array
$array_numeros = [7,2,4,9,1];
$mayor = $array_numeros[0];
$menor = $array_numeros[0];
$posicion_mayor = 0;
$posicion_menor = 0;

for($i = 0; $i < count($array_numeros); $i++){
    if($array_numeros[$i] > $mayor){
        $mayor = $array_numeros[$i];
        $posicion_mayor = $i;
    }
    if($array_numeros[$i] < $menor or $menor == 0){
        $menor = $array_numeros[$i];
        $posicion_menor = $i;
    }
}

echo "Usando for: <br>";
echo "El valor máximo es: ".$mayor." en la posicion ".$posicion_mayor."<br>";
echo "El valor máximo es: ".$menor." en la posicion ".$posicion_menor;

foreach ($array_numeros as $indice => $numero) {
    if ($numero > $mayor) {
        $mayor = $numero;
        $posicion_mayor = $indice;
    }
    if ($numero < $menor) {
        $menor = $numero;
        $posicion_menor = $indice;
    }
}

echo "Usando foreach: <br>";
echo "El valor máximo es: $mayor en la posición $posicion_mayor<br>";
echo "El valor mínimo es: $menor en la posición $posicion_menor";

/**$array_numeros = [7, 2, 4, 9, 1];

$mayor = max($array_numeros);
$menor = min($array_numeros);

$posicion_mayor = array_search($mayor, $array_numeros); //busca el valor en el array
$posicion_menor = array_search($menor, $array_numeros);

echo "Con funciones: <br>";
echo "Máximo: $mayor en la posición $posicion_mayor<br>";
echo "Mínimo: $menor en la posición $posicion_menor"; */