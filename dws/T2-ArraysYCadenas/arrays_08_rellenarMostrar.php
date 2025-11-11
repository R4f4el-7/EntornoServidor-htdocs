<?php
/*Funcion para rellenar y mostrar array*/
function rellenarArray($tama){
    $arr = [];
    for($i = 0; $i < $tama; $i++){
        $arr[$i] = rand(1,10); 
    }
    return $arr;
}
function mostrarArray($arr){
    foreach($arr as $valor){
        echo $valor."|";
    }
}
$tama = 4;
$arr = rellenarArray($tama);
mostrarArray($arr);