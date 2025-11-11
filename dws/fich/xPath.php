<?php
 $datos = simplexml_load_file("empleados.xml");
 $salario = $datos->xpath("empleado/salario");
 foreach($salario as $valor){
    print_r($valor);
    echo "<br>";
 }