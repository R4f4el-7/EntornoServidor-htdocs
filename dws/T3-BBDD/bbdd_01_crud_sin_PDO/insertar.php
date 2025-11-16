<?php 
    require "db.php";
    
    if(isset($_POST["insertar"])){
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conexion, $_POST["apellido"]);

    // Insertar SOLO nombre y apellido
    $sql = "INSERT INTO persona (nombre, apellido) VALUES ('$nombre', '$apellido')";

    if(mysqli_query($conexion, $sql)){
        echo "Registro insertado correctamente con ID: " . mysqli_insert_id($conexion);
    } else {
        echo "Error: " . mysqli_error($conexion);
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

