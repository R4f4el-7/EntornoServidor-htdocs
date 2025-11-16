<?php 
    require "db.php";
    
    if(isset($_POST["eliminar"])){
        $id = $_POST["id"];

        /*Eliminar*/
        if (!mysqli_query($conexion, "DELETE FROM persona WHERE id = $id;")){
            die(printf("No se puede eliminar la tabla: [%d] %s", mysqli_connect_errno(),
            mysqli_connect_error()));
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
    <form action="eliminar.php" method="post">  
        <h2>Eliminar</h2>
        Id:<br>
        <input type="text" name="id"><br>  
        <input type="submit" name="eliminar" value="eliminar">
    </form>

    <a href="index.php">Volver al menu</a>
</body>
</html>