<?php
require "conexion.php";
//Crear tabla si no existe
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS $table (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    precio DECIMAL(6,2),
    cantidad int
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
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
    <h2>Crear tabla persona</h2>
    <a href="index.php">Volver al menú</a>
</body>
</html>