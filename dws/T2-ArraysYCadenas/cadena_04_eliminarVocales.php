<?php
/**Eliminar vocales de la cadena*/
$cadena = "Es un error capital el teorizar antes de poseer datos";
echo "Cadena original: ".$cadena."<br>";

$arr_cadena = str_split($cadena);

for($i = 0; $i < count($arr_cadena); $i++){
    if($arr_cadena[$i] == "a"||$arr_cadena[$i] == "e"||$arr_cadena[$i] == "i"||$arr_cadena[$i] == "o"||$arr_cadena[$i] == "u"){
        $arr_cadena[$i] = "";
    }
}

$cadena_sinVocales = implode("", $arr_cadena);
echo "Cadena si vocales: ".$cadena_sinVocales;