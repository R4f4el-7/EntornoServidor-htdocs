<?php 
    require "db.php";
    
    if(isset($_POST["actualizar"])){
    $id = $_POST["id"];
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conexion, $_POST["apellido"]);

    /*Actualizar*/
    $actualiza = "UPDATE persona SET nombre = '$nombre', apellido = '$apellido' WHERE id = $id;";

    if (!mysqli_query($conexion, $actualiza)) {
        die(printf("No se puede actualizar la base de datos: [%d] %s", mysqli_connect_errno(), mysqli_connect_error())); 
    }

    $cantidad = mysqli_affected_rows($conexion);
    printf("Se han actualizado " . $cantidad . " conjuntos de datos<BR />");
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