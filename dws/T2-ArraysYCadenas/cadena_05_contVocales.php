<?php
/**Contar vocales*/
$cadena = "Ves, pero no observas";
echo "Cadena original: ".$cadena."<br>";

$arr_cadena = str_split($cadena);
$cont_vocal = 0;

for($i = 0; $i < count($arr_cadena); $i++){
    if($arr_cadena[$i] == "a"||$arr_cadena[$i] == "e"||$arr_cadena[$i] == "i"||$arr_cadena[$i] == "o"||$arr_cadena[$i] == "u"){
        $cont_vocal++;
    }
}

echo "Cantidad de vocales: ".$cont_vocal;