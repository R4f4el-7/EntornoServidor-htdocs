<?php
session_start();
$_SESSION["contador"] = 0;
require "conexion.php";
//Crear tabla usuarios si no existe
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS $table_usu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL,
    contrasena VARCHAR(50) NOT NULL
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//inserccion de datos requeridos
if($_SESSION["contador"] = 1){
 try {
        $sql = "INSERT INTO $table_usu (usuario, contrasena) VALUES (?, ?)";//Lo correcto es usar placeholders(? o :nombre) que previene inyección SQL y no interpolar las variables directamente
        $stmt = $conexion->prepare($sql);//método de PDO que prepara la consulta para ejecutarla más tarde(analiza sql,verifica que los placeholders sean válidos)
        $stmt->execute(["admin","admin"]);

        $sql = "INSERT INTO $table_usu (usuario, contrasena) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(["cliente1","1234"]);

        $sql = "INSERT INTO $table_usu (usuario, contrasena) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(["cliente2","1234"]);


        echo "Datos insertados correctamente";
    } catch (PDOException $e) {
        die("No se puede insertar datos: " . $e->getMessage());
    }
}else{
    $_SESSION["contador"] = $_SESSION["contador"] + 1;
}

//Crear tabla peliculas si no existe e insertar datos
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS $table_peli (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    sillas_total INT NOT NULL,
    sillas_reservadas INT DEFAULT 0
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//Crear tabla reservas si no existe
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS $table_reserva (
    id INT PRIMARY KEY,
    usuario_id INT NOT NULL,
    pelicula_id INT NOT NULL,
    sillas_reservadas INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (pelicula_id) REFERENCES peliculas(id)
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
if(isset($_POST["insertar"])){
    $_SESSION["insertar"] = $_POST["insertar"];
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["disponible"] = $_POST["disponible"];
    $_SESSION["reservar"] = $_POST["reservar"];

    header("Location: reservar.php");
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
    <h2>Cine</h2>
    <form acction="cine.php" method="post">
        Nombre pelicula:<br>
        <input type="text" name="nombre"><br>
        Total de sillas disponibles:<br>
        <input type="text" name="disponible"><br>
        Sillas que reservar:<br>
        <input type="text" name="reservar"><br>
        <input type="submit" name="insertar" value="Insertar">
    </form>
</body>
</html>