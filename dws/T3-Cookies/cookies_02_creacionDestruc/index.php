<?php
//Crear 
if(isset($_POST["crear"])){
    if(isset($_POST["tiempo"])){
        $tiempo = intval($_POST["tiempo"]);
    }else{
        $tiempo = 0;
    }
    $expira = time() + ($tiempo);
    setcookie("cookie1", "cookie creada bro", $expira, "/");
    setcookie("cookie1_expira", $expira, $expira, "/");
}
//Comprobar 
if(isset($_POST["comprobar"])){
    if (isset($_COOKIE["cookie1"])) {
        $ahora = time();
        $restante = $_COOKIE["cookie1_expira"] - time();
        echo "La cookie1 existe y vale: " . $_COOKIE["cookie1"] . " le quedan " . $restante . " segundos";
    } else {
        echo "La cookie1 no existe.";
    }
}
//Destruir 
if(isset($_POST["destruir"])){
    setcookie("cookie1", "", time() - 3600, "/");//destruir una cookie es como renombrarla
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        tiempo de cookie:<br>
        <input type="text" name="tiempo">
        <button name="crear">Crear cookie</button>
        <button name="comprobar">Comprobar la cookie</button>
        <button name="destruir">Destruir cookie</button>
    </form>
</body>
</html>