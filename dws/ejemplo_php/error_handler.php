<?php
    function($errno, $str, $file, $line){
        echo "Ocurrio el error: $errno";
    }

    //set_error_handler("manejadorErrores");
    //$a = $b // causa error, $b no esta inicializada
?>