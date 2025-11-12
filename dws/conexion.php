<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "test";

/* Crear conexión */
$conexion = new mysqli($server, $user, $pass, $db);

/* Verificar conexión */
if ($conexion->connect_errno) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "Conectado correctamente<br>";
}
/*. Eliminar una tabla "DROP TABLE "*/
if (!mysqli_query($conexion, "DROP TABLE aulas" )){
    die(printf("No se puede eliminar la tabla: [%d] %s", mysqli_connect_errno(),
    mysqli_connect_error()));
}
/* Definir la creación de la tabla */
$sql = "CREATE TABLE IF NOT EXISTS aulas (
    id_aula VARCHAR(6) PRIMARY KEY,
    nombre_aula VARCHAR(25),
    numero_aula INT
)";
if (!mysqli_query($conexion, $sql)) {
    die("Error al crear la tabla: " . mysqli_error($conexion));
}

/*Insertar*/
mysqli_query($conexion, "INSERT INTO aulas VALUES('99','Aula roja', 1)");
mysqli_query($conexion, "INSERT INTO aulas VALUES('77','Aula azul', 2)");

/*Actualizar*/
$actualiza = "UPDATE aulas SET numero_aula = 7 WHERE nombre_aula = 'Aula azul';";

if (!mysqli_query($conexion, $actualiza)) {
    die(printf("No se puede actualizar la base de datos: [%d] %s", mysqli_connect_errno(), mysqli_connect_error())); 
}

$cantidad = mysqli_affected_rows($conexion);
printf("Se han actualizado " . $cantidad . " conjuntos de datos<BR />");

/* Cerrar la conexión */
$conexion->close();
?>
