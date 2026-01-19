<?php
session_start();
require "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php if (!empty($_SESSION['correo']) && $_SESSION['nombre'] == "admin"): ?>
        <h3>Buenos días <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>
        <h2>Estas en la vista del admin</h2>
        <a href="logout.php">Cerrar sesión</a>
    <?php elseif (!empty($_SESSION['correo'])): ?>
        <h3>Buenos días <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>

        <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
        <h3>No has iniciado sesión</h3>

        <a href="login.php">Iniciar sesión</a><br>
        <a href="registro.php">Registrarse</a>
    <?php endif; ?>
</body>
</html>