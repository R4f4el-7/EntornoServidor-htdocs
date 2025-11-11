<?php
 function calculador($operacion, $numa, $numb){
 $resul = $operacion($numa, $numb);
    return $resul;
 }
 function sumar($a, $b){
    return $a + $b;
 }
 function multiplicar($a, $b){
    return $a * $b;
 }
 function division($a, $b){
    if($b == 0){
        return "no entre 0";
    }
    return $a / $b;
 }
 $a = 4;
 $b = 0;
 $r1 = calculador("division", $a, $b);
 echo "$r1 <br>";
 $r2 = calculador("sumar", $a, $b);
 echo "$r2 <br>";
?>