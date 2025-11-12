<?php 
$server = "localhost";
$user = "root";
$pass = "";
$db = "test";
$table = "persona";

/* Crear conexión */
$conexion = new mysqli($server, $user, $pass, $db);

/* Verificar conexión */
if ($conexion->connect_errno) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "Conectado correctamente<br>";
}
/*Base de datos*/

/* Definir la creación de la tabla */
$sql = "CREATE TABLE IF NOT EXISTS persona (
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(25),
    apellido VARCHAR(25)
)";
if (!mysqli_query($conexion, $sql)) {
    die("Error al crear la tabla: " . mysqli_error($conexion));
}