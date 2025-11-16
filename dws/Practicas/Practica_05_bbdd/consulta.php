<?php 
require "db.php";

$nombre = "";
$apellido = "";

if(isset($_POST["consulta"])){
    $id = $_POST["id"];
    //Validar ID
    if(!is_numeric($id) || $id <= 0){
        die("ID inválido");
    }
    //Consulta
    try {
        $sql = "SELECT nombre, apellido FROM $table WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario){
            $nombre = $usuario["nombre"];
            $apellido = $usuario["apellido"];

            echo "Nombre: ".$nombre."<br>";
            echo "Apellido ".$apellido."<br>";
        } else {
            echo "No se encontró ninguna persona con ese ID";
        }

    } catch (PDOException $e) {
        die("No se puede consultar la tabla: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Persona</title>
</head>
<body>
    <form action="consulta.php" method="post">  
        <h2>Consulta</h2>
        Id:<br>
        <input type="text" name="id"><br>  
        <input type="submit" name="consulta" value="Consulta">
    </form>

    <a href="index.php">Volver al menú</a>
</body>
</html>