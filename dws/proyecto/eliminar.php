<?php
session_start();
require "conexion.php";

//Solo admin
if (empty($_SESSION['correo']) || $_SESSION['nombre'] !== 'admin') {
    die("Acceso denegado");
}

if(isset($_POST["eliminar"])){
    $id = $_POST["id"];

    //Validar que sea un número entero positivo
    if(!is_numeric($id) || $id <= 0){
        die("ID inválido");
    }

    try {
        $sql = "DELETE FROM libros WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);

        //Comprobar si se eliminó algún registro
        //Se usa rowCount() para filas afectadas por una consulta SQL
        if($stmt->rowCount() > 0){
            echo "Libro eliminado correctamente";
        } else {
            echo "No se encontró ningun producto con ese ID";
        }
    } catch (PDOException $e) {
        die("No se puede eliminar a la producto: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="cuadroRetro">
        <form action="eliminar.php" method="post">  
            <h2>Eliminar libro</h2>
            Id:<br>
            <input type="text" name="id"><br>  
            <input type="submit" name="eliminar" value="eliminar">
        </form>
    </div>

    <a href="index.php">Volver al menu</a>
</body>
</html>