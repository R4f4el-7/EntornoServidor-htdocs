<?php 
require "db.php";
    
if(isset($_POST["actualizar"])){
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    //Validar ID
    if(!is_numeric($id) || $id <= 0){
        die("ID inválido");
    }
    /*Actualizar*/
    try {
        $sql = "UPDATE persona SET nombre = ?, apellido = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$nombre, $apellido, $id]);

        //Número de registros afectados
        if($stmt->rowCount() > 0){
            echo "Se han actualizado " . $stmt->rowCount() . " registros";
        } else {
            echo "No se encontró ninguna persona con ese ID o no hubo cambios";
        }
    } catch (PDOException $e) {
        die("No se puede actualizar la base de datos: " . $e->getMessage());
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
    <form action="actualizar.php" method="post">  
        Id:<br>
        <input type="text" name="id"><br>  
        Nombre:<br>
        <input type="text" name="nombre"><br>
        Apellido:<br>
        <input type="text" name="apellido"><br>
        <input type="submit" name="actualizar" value="actualizar">
    </form>

    <a href="index.php">Volver al menu</a>
</body>
</html>