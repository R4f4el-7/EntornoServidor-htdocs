<!DOCTYPE html>
<html>
    <?php
    /* declaracion de variables*/ 
    $entero = 4;
    $numero = 4.5;
    $cadena = "cadena";
    $bool = TRUE;
    /*cambio de variable*/
    $a = 5;
    echo gettype($a); // imprime el tipo de a (integrer)
    echo "<br>";
    $a = "Hola"; // cambia a cadena
    echo gettype($a); 
    echo "<br>";
    echo $a;
    ?>
</html>