<?php
session_start();

if(isset($_POST["login"])){
        if(!empty($_POST["usuario"]) && !empty($_POST["password"])){
            $_SESSION["usuario"] = $_POST["usuario"];
            $_SESSION["password"] = $_POST["password"];
            
            header("Location: home.php");
        }else{
            echo "No hay usuario o contraseña";
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
    <form action="index.php" method="post">
        Usuario:<br>
        <input type="text" name="usuario"><br>
        Contraseña:<br>
        <input type="password" name="password"><br>

        <input type="submit" value="login" name="login">
    </form>
</body>
</html>
