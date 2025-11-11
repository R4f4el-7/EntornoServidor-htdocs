<?php
/*Contar el número de elementos positivos, negativos y que valgan cero en un array de 10 enteros. 
Los valores habrán sido harcodeados en un array. La salida por pantalla debería ser similar a esta:

Array con valores harcodeados: [1, 9, -3, 8, -5, 0, 3, 4, 6, -7]
Cantidad de positivos:  6
Cantidad de negativos:  3
Cantidad de ceros:  1 
Leer 10 enteros harcodeados en un array y mostrar la media de los valores negativos y la de los positivos.*/

$arr_numeros = [1, 9, -3, 8, -5, 0, 3, 4, 6, -7];
$total_positivo = 0;
$total_negativo = 0;
$contador_positivo = 0;
$contador_negativo = 0;
$contador_cero = 0;

for($i = 0; $i < count($arr_numeros); $i++){
    if($arr_numeros[$i] > 0){
        $total_positivo += $arr_numeros[$i];
        $contador_positivo++;
    }else if($arr_numeros[$i] < 0){
        $total_negativo += $arr_numeros[$i];
        $contador_negativo++;
    }else{
        $contador_cero++;
    }
}

echo "Cantidad de positivos: ". $contador_positivo."<br>";
echo "Cantidad de negativos: ". $contador_negativo."<br>";
echo "Cantidad de cero: ". $contador_cero."<br>";

echo "Promedio positivo: ". ($total_positivo/$contador_positivo)."<br>";
echo "Promedio negativo: ". ($total_negativo/$contador_negativo)."<br>";