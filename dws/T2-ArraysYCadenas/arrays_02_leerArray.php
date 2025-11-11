<?php
/* Crea un array con cinco nombres de persona y recórrelo con un bucle for mostrando el texto «Conozco a alguien llamado «*/
$array_nombres = ["Alejandro", "Alberto", "Federico", "Carmelo", "Gervasio"];

foreach($array_nombres as $valor){
    echo "Conozco a alguien llamado ".$valor."<br>";
}
echo "------------------------------------------------<br>";
for($i = 0; $i < count($array_nombres); $i++){
    echo "Conozco a alguien llamado ".$array_nombres[$i]."<br>";
}