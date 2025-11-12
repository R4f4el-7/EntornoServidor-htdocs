<?php 
require "db.php";

if(isset($_POST["insertar"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    try {
        $sql = "INSERT INTO persona (nombre, apellido) VALUES (?, ?)";//Lo correcto es usar placeholders(? o :nombre) que previene inyección SQL y no interpolar las variables directamente
        $stmt = $conexion->prepare($sql);//método de PDO que prepara la consulta para ejecutarla más tarde(analiza sql,verifica que los placeholders sean válidos)
        $stmt->execute([$nombre,$apellido]);

        echo "Datos insertados correctamente";
    } catch (PDOException $e) {
        die("No se puede insertar datos: " . $e->getMessage());
    }
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
    <form action="insertar.php" method="post">    
        Nombre:<br>
        <input type="text" name="nombre"><br>
        Apellido:<br>
        <input type="text" name="apellido"><br>
        <input type="submit" name="insertar" value="Insertar">
    </form>

    <a href="index.php">Volver al menu</a>
</body>
</html>