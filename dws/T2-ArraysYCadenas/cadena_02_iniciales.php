<?php
/*1.- Iniciales
Crea un programa con una frase y la transforme en título, de tal manera que cada inicial
de las palabras que compone la frase irá en mayúscula y el resto de letras de la palabra en
minúscula.
*/
$cadena = "gerVaSio vICando eS floreRo";
echo "Cadena original: ".$cadena."<br>";
$arr_cadena = str_split($cadena);

for($i = 0; $i < count($arr_cadena); $i++){
    if($i == 0 || $arr_cadena[$i-1] == " "){
        $arr_cadena[$i] = strtoupper($arr_cadena[$i]);
    }else{
        $arr_cadena[$i] = strtolower($arr_cadena[$i]);
    }
}

$cadena_titulo = implode("", $arr_cadena);
echo "Cadena en titulo: ".$cadena_titulo;