<?php
    //cookie = guarda la informacion de usuario en la pagina
    //setcookie(clave, valor, tiempo que durará la cookie, ??);
    setcookie("comida", "pizza", time() + (86400 * 2), "/");
    setcookie("bebida", "monster", time() + (86400 * 1), "/");
    setcookie("postre", "mcflurry", time() + (86400 * 1), "/");

    foreach($_COOKIE as $key => $valor){
        echo $key . " = " . $valor."<br>";
    }

    if(isset($_COOKIE["comida"])){
        echo "La comida favorita es ".$_COOKIE["comida"];
    }else{
        echo "No se tu comida";
    }
?>