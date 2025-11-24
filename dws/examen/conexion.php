<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "examen";
$table = "producto";
//Se conecta solo al servidor MySQL (mysql:host=$server), sin usar dbname. Esto evita el error si la base aún no existe.
try {
    $conexion = new PDO("mysql:host=$server;charset=utf8", $user, $password);
    //Esto configura el modo de manejo de errores de PDO para que lance excepciones (PDOException) cuando algo sale mal.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/*setAttribute sirve para configurar un atributo interno del objeto PDO.*/

    echo "Conexión exitosa <br>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
//Crear base de datos si no existe
try {
    $sqlDB = "CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conexion->exec($sqlDB);
    echo "Base de datos '$db' creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la base de datos: " . $e->getMessage());
}

//Conectarse ahora sí a la base de datos. 
try {
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión a la base '$db' exitosa<br>";
} catch (PDOException $e) {
    die("No se puede conectar a la base '$db': " . $e->getMessage());
}
?>
