<?php 
    if(isset($_POST["iniciar"])){
        $usuario = $_POST["usuario"];
        setcookie('cookie1', $usuario, time() + 30*24*60*60);
        echo "El valor de la cookie nombre de la cookie es: " . $_COOKIE['cookie1'];

        if($_POST["usuario"] == "admin" && $_POST["password"] == "1234"){
            header("Location: entrada.php");
        }else{
            header("Location: error.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario_01</title>
</head>
<body>
    <form action="index.php" method="post">
        <label>Usuario:</label><br>
        <input type="text" name="usuario"><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="iniciar" value="iniciar">
    </form>
</body>
</html>
