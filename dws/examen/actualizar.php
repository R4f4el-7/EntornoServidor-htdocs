<?php 
require "conexion.php";
    
if(isset($_POST["actualizar"])){
    $id = $_POST["id"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    //Validar ID
    if(!is_numeric($id) || $id <= 0){
        die("ID inválido");
    }
    /*Actualizar*/
    try {
        $sql = "UPDATE $table SET precio = ?, cantidad = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$precio, $cantidad, $id]);

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
        Precio:<br>
        <input type="text" name="precio"><br>
        Cantidad:<br>
        <input type="text" name="cantidad"><br>
        <input type="submit" name="actualizar" value="actualizar">
    </form>

    <a href="index.php">Volver al menu</a>
</body>
</html>