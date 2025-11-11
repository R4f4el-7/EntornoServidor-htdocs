<?php
/**Array de multiplos de 3*/
$arr = [];

for($i = 0; $i < 10;$i++){
    $arr[$i] = $i * 3;
}

foreach($arr as $valor){
    echo $valor."|";
}
