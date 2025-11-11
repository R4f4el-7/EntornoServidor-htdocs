<?php
/*Contador de palabras
Comprueba el número de palabras que hay en una frase, teniendo en cuenta
que las palabras se separan por un espacio. */
$cadena = "En un lugar de la Mancha, de cuyo nombre no quiero acordarme";
echo "Cadena original: ".$cadena."<br>";

$arr_cadena = str_split($cadena);
$cont_palabras = 1;

for($i = 0; $i < count($arr_cadena); $i++){
    if($arr_cadena[$i] == " "){
        $cont_palabras++;
    }
}

echo "Hay ".$cont_palabras." palabras";