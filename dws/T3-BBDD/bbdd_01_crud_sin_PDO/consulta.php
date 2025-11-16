<?php 
require "db.php";

$nombre = "";
$apellido = "";

if(isset($_POST["consulta"])){
    $id = $_POST["id"];

    //Escapar para seguridad
    $id = mysqli_real_escape_string($conexion, $id);

    //Consulta
    $resultado = mysqli_query($conexion, "SELECT nombre, apellido FROM persona WHERE id = '$id';");

    if(!$resultado){
        die("Error al consultar: " . mysqli_error($conexion));
    }

    //Verificar si hay resultados
    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_assoc($resultado);
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
    } else {
        echo "No se encontró ninguna persona con ese ID.<br>";
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
        <input type="text" name="id" value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : ''; ?>"><br>  
        <input type="submit" name="consulta" value="Consulta">
    </form>

    <?php if($nombre || $apellido): ?>
        <h3>Resultados:</h3>
        Nombre: <?php echo htmlspecialchars($nombre); ?><br>
        Apellido: <?php echo htmlspecialchars($apellido); ?><br>
    <?php endif; ?>

    <a href="index.php">Volver al menú</a>
</body>
</html>