<?php
session_start();

if(isset($_POST["login"])){
    //crear cookie
    if(isset($_POST["crear"])){
        require "cookies.php";

        if(!empty($_POST["usuario"]) && !empty($_POST["password"])){
            $_SESSION["usuario"] = $_POST["usuario"];
            $_SESSION["password"] = $_POST["password"];
            
            header("Location: cine.php");
            exit;
        }else{
            echo "No hay usuario o contraseña";
        }
    }else{
        echo "Debe aceptar las cookies para continuar";
    }
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
    <h2>Login</h2>
    <form method="post">
        Usuario:<br>
        <input type="text" name="usuario"><br>
        Contraseña:<br>
        <input type="password" name="password"><br>
        <input type="checkbox" name="crear" require>Al aceptar, permites el uso de cookies según nuestra política de privacidad."<br>
        <input type="submit" value="login" name="login">
    </form>
</body>
</html>
