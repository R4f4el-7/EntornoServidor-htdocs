<?php 
$server = "localhost";
$user = "root";
$pass = "";
$db = "practica_cosquillo";
$table = "persona";

/* Crear conexión sin especificar la base de datos */
$conexion = new mysqli($server, $user, $pass);

/* Verificar conexión */
if ($conexion->connect_errno) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "Conectado correctamente al servidor<br>";
}

/* Crear base de datos si no existe */
$sqlDB = "CREATE DATABASE IF NOT EXISTS $db";
if (!$conexion->query($sqlDB)) {
    die("Error al crear la base de datos: " . $conexion->error);
} else {
    echo "Base de datos: '$db'<br>";
}

/* Seleccionar la base de datos */
$conexion->select_db($db);

/* Crear tabla si no existe */
$sqlTable = "CREATE TABLE IF NOT EXISTS $table (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(25),
    apellido VARCHAR(25)
)";
if (!$conexion->query($sqlTable)) {
    die("Error al crear la tabla: " . $conexion->error);
} else {
    echo "Tabla: '$table'<br>";
}
?>