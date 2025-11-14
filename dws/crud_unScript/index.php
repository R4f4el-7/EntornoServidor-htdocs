<?php
// --- Conexión a la base de datos ---
$server = "localhost";
$user = "root";
$password = "";
$db = "base_persona";
$table = "persona";

try {
    $conexion = new PDO("mysql:host=$server;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa <br>";
    //Crear base de datos si no existe
    $conexion->exec("CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8 COLLATE utf8_general_ci");

    echo "Base de datos '$db' creada correctamente <br>";
    //Conectar con la base de datos ya que ahora existe
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión a la base '$db' exitosa<br>";
    //Crear tabla si no existe
    $conexion->exec("CREATE TABLE IF NOT EXISTS $table (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(25),
        apellido VARCHAR(25)
    )");

    echo "Tabla '$table' creada correctamente <br>";
} catch (PDOException $e) {
    die("Error en la base de datos: " . $e->getMessage());
}

// --- Manejo del menú ---
/*?? '' significa que si no se envió nada por POST, 
la variable se inicializa como cadena vacía(false) para evitar errores.*/
$opcion = $_POST['opcion'] ?? '';
$accion = $_POST['accion'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas</title>
</head>
<body>
    <h1>Gestión de Personas</h1>
    <!--Si no hay opción, se muestra el menu -->
    <?php if(!$opcion): ?>
        <h4>1. Insertar</h4>
        <h4>2. Actualizar</h4>
        <h4>3. Borrar</h4>
        <h4>4. Consultar</h4>

        <form method="post">
            <label>Elige opción (1-4):</label>
            <input type="text" name="opcion">
            <input type="submit" value="Aceptar">
        </form>
    <?php endif; ?>

    <?php if($opcion == 1)://Insertar ?>
        <h2>Insertar Persona</h2>
        <?php
        if($accion == 'insertar'){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            try {
                $stmt = $conexion->prepare("INSERT INTO persona (nombre, apellido) VALUES (?, ?)");
                $stmt->execute([$nombre, $apellido]);

                echo "<p>Datos de '$nombre' han sido insertados correctamente</p>";
            } catch (PDOException $e){
                echo "Error al insertar: ".$e->getMessage();
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="opcion" value="1"><!--La página sigue sabiendo que estamos en opción 1-->
            <input type="hidden" name="accion" value="insertar"><!-- La acción sea 'insertar', lo que activa la lógica de inserción -->
            
            Nombre:<br><input type="text" name="nombre"><br>
            Apellido:<br><input type="text" name="apellido"><br>

            <input type="submit" value="Insertar">
        </form>
        <a href="index.php">Volver al menú</a>
    <?php endif; ?>

    <?php if($opcion == 2)://Actualizar ?>
        <h2>Actualizar Persona</h2>
        <?php
        if($accion == 'actualizar'){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            //Validar que ID sea un número entero positivo
            if(!is_numeric($id) || $id <= 0){
                echo "<p>ID inválido</p>";
            } else {
                try {
                    $stmt = $conexion->prepare("UPDATE persona SET nombre=?, apellido=? WHERE id=?");
                    $stmt->execute([$nombre, $apellido, $id]);

                    //Número de registros afectados
                    if($stmt->rowCount() > 0){
                        echo "Se han actualizado " . $stmt->rowCount() . " registros";
                    } else {
                        echo "No se encontró ninguna persona con ese ID o no hubo cambios";
                    }
                } catch(PDOException $e){
                    echo "Error al actualizar: ".$e->getMessage();
                }
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="opcion" value="2">
            <input type="hidden" name="accion" value="actualizar">

            Id:<br><input type="text" name="id"><br>
            Nombre actualizado:<br><input type="text" name="nombre"><br>
            Apellido actualizado:<br><input type="text" name="apellido"><br>
            
            <input type="submit" value="Actualizar">
        </form>
        <a href="index.php">Volver al menú</a>
    <?php endif; ?>

    <?php if($opcion == 3): // Eliminar ?>
        <h2>Eliminar Persona</h2>
        <?php
        if($accion == 'eliminar'){
            $id = $_POST['id'];

            if(!is_numeric($id) || $id <= 0){
                echo "<p>ID inválido</p>";
            } else {
                try {
                    $stmt = $conexion->prepare("DELETE FROM persona WHERE id=?");
                    $stmt->execute([$id]);

                    //Comprobar si se eliminó algún registro
                    //Se usa rowCount() para filas afectadas por una consulta SQL
                    if($stmt->rowCount() > 0){
                        echo "Persona eliminada correctamente";
                    } else {
                        echo "No se encontró ninguna persona con ese ID";
                    }
                } catch(PDOException $e){
                    echo "Error al eliminar: ".$e->getMessage();
                }
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="opcion" value="3">
            <input type="hidden" name="accion" value="eliminar">

            Id:<br><input type="text" name="id"><br>
            
            <input type="submit" value="Eliminar">
        </form>
        <a href="index.php">Volver al menú</a>
    <?php endif; ?>

    <?php if($opcion == 4): // Consultar ?>
        <h2>Consultar Persona</h2>
        <?php
        if($accion == 'consulta'){
            $id = $_POST['id'];
            if(!is_numeric($id) || $id <= 0){
                echo "<p>ID inválido</p>";
            } else {
                try {
                    $stmt = $conexion->prepare("SELECT nombre, apellido FROM persona WHERE id=?");
                    $stmt->execute([$id]);
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if($usuario){
                        echo "<p>Nombre: ".$usuario['nombre']."<br>Apellido: ".$usuario['apellido']."</p>";
                    } else {
                        echo "<p>No se encontró la persona</p>";
                    }
                } catch(PDOException $e){
                    echo "Error al consultar: ".$e->getMessage();
                }
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="opcion" value="4">
            <input type="hidden" name="accion" value="consulta">
            Id:<br><input type="text" name="id"><br>
            <input type="submit" value="Consultar">
        </form>
        <a href="index.php">Volver al menú</a>
    <?php endif; ?>

</body>
</html>
