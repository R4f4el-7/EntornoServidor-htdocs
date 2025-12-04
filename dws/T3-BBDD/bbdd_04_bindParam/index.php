<?php
// --- Conexión a la base de datos ---
$server = "localhost";
$user = "root";
$password = "";
$db = "test";
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
        <h4>2. Consultar</h4>

        <form method="post">
            <label>Elige opción (1-2):</label>
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

                $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
                $stmt->bindParam(2, $apellido, PDO::PARAM_STR);

                $stmt->execute();

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

    <?php if($opcion == 2): // Consultar ?>
        <h2>Consultar Persona</h2>
        <?php
        //Consulta por ID
        if($accion == 'consulta'){
            $id = $_POST['id'];
            if(!is_numeric($id) || $id <= 0){
                echo "<p>ID inválido</p>";
            } else {
                try {
                    $stmt = $conexion->prepare("SELECT nombre, apellido FROM persona WHERE id=?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    /*Tipos comunes de parámetros 
                    PDO::PARAM_INT → enteros 
                    PDO::PARAM_STR → cadenas 
                    PDO::PARAM_BOOL → booleanos 
                    PDO::PARAM_NULL → null */
                    $stmt->execute();
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC - Es una constante que indica que quieres que los datos se devuelvan como un array asociativo
                    
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
        <!-- FORMULARIO -->
        <form method="post">
            <input type="hidden" name="opcion" value="2">
            <input type="hidden" name="accion" value="consulta">
            Id:<br><input type="text" name="id"><br>
            <input type="submit" value="Consultar">
        </form>
        
        <a href="index.php">Volver al menú</a>
    <?php endif; ?>
</body>