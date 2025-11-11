<?php
    $cadena = "Hola mundo";
    $array_cadena = str_split($cadena);//Convierte la cadena en array
    //$array_cadena = explode(" ",$cadena); explode(separador, cadena, límite); && explode() no sirve para separar por cada carácter
    echo "Cantidad de letras: ". count($array_cadena). "<br><br>";

    //mostrar letra por letra
    for($i = 0; $i < count($array_cadena); $i++){
        echo "Letra " . $i . " : " . $array_cadena[$i]. "<br>";
    }

    //eliminar espacios
    for($i = 0; $i < count($array_cadena); $i++){
        if($array_cadena[$i] == " "){
            $array_cadena[$i] = "";
        }
    }

    $cadena_sinEspacio = implode("", $array_cadena);//de array → string && implode(separador, array);
    echo "Cadena sin espacios: ".$cadena_sinEspacio. "<br><br>";
    
    //Mayusculas pares y minusculas impares
    for($i = 0; $i < count($array_cadena); $i++){
        if($i % 2 == 0){
            $array_cadena[$i] = strtoupper($array_cadena[$i]);
        }else{
            $array_cadena[$i] = strtolower($array_cadena[$i]);
        }
    }

    $cadena_mayus_minus = implode("",$array_cadena);
    echo "Siendo las letras pares mayuscula y las impares minuscula: ". $cadena_mayus_minus. "<br><br>";
?>