<?php
    echo "Primer anidado <br>";
    for($i = 0; $i < 3; $i++){
        for($j = 0; $j < 3; $j++){
            echo "i: $i j: $j <br>";
            if ($j == 1) {
            break; //es lo mismo que poner break 1
            }
        }
    }
    echo "Segundo anidado <br>";
    for($i = 0; $i < 3; $i++){
        for($j = 0; $j < 3; $j++){
            echo "i: $i j: $j <br>";
            if ($j == 1) {
            break 2; //es lo mismo que poner break 1
            }
        }
    }
?>