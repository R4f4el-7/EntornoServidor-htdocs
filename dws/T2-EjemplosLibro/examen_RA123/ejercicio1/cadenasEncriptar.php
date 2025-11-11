<?php
    $cadena="Valentina Anzoátegui Urrutia-Garrogerrikaetxebarria";

    $array1 = str_split($cadena);

    //Eliminar espacios en blanco
    foreach ($array1 as $nombre){
        if($nombre == " "){
            $nombre = "";
        }
        echo "$nombre";
    }
?>