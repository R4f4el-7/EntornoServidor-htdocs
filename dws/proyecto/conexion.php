<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "proyecto_biblioteca";
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
//Creacion de tablas
//Tabla usuario
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(100),
        apellido1 VARCHAR(100),
        apellido2 VARCHAR(100),
        telefono VARCHAR(100),
        correo VARCHAR(100),
        contrasenia VARCHAR(100)
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//Tabla libros
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS libros (
        libro_id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(100),
        isbn VARCHAR(13) UNIQUE,
        anio_publicacion INT,
        categoria VARCHAR(30),
        stock INT NOT NULL
    );";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//Tabla prestamo
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS prestamos (
        prestamo_id INT PRIMARY KEY AUTO_INCREMENT,
        usuario_id INT NOT NULL,
        fecha_prestamo DATE,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//Tabla detalles_prestamo
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS detalles_prestamo  (
        detalle_id INT AUTO_INCREMENT PRIMARY KEY,
        prestamo_id INT NOT NULL,
        libro_id INT NOT NULL,
        cantidad_prestada INT NOT NULL,
        fecha_devolucion DATE,
        FOREIGN KEY (prestamo_id) REFERENCES prestamos(prestamo_id),
        FOREIGN KEY (libro_id) REFERENCES libros(libro_id)
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}

?>
