<?php
require "conexion.php";
    try {
        // Primero desconectar cualquier base que esté en uso:
        $conexion = new PDO("mysql:host=$server;charset=utf8", $user, $password);

        // Borrar la base de datos
        $conexion->exec("DROP DATABASE IF EXISTS $db");
        echo "<p>La base de datos '$db' ha sido eliminada correctamente.</p>";
    } catch(PDOException $e){
        echo "<p>Error al borrar la base de datos: " . $e->getMessage() . "</p>";
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
    <h2>Borrar Base de Datos</h2>
    <a href="index.php">Volver al menú</a>
</body>
</html>