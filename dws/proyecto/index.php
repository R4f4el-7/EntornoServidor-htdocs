<?php
session_start();
require "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Buenos dias <?php echo $_SESSION["usuario"] ?> </h3>
    <h2>Login</h2>
    <a href="login.php">Iniciar sesion</a>
    <h2>Registrarse</h2>
    <a href="registro.php">Registrarse</a>
    <!--Solo aparece si se ha iniciado-->
    <?php if(!empty($_SESSION["usuario"])): ?>
        <h2>Logout<h2>
        <a href="logout.php">ir a logout</a>
    <?php endif; ?>
</body>
</html>