<?php 
require "conexion.php";

$nombre = "";
$apellido = "";

if(isset($_POST["consulta"])){
    //Consultar todos
    try {
                $stmt = $conexion->query("SELECT id, nombre, precio, cantidad FROM $table");
                $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($personas) > 0){
                    echo "<h3>Lista de todas las personas</h3>";
                    echo "<table border='1' cellpadding='5'>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                            </tr>";

                    foreach($personas as $p){
                        echo "<tr>
                                <td>{$p['id']}</td>
                                <td>{$p['nombre']}</td>
                                <td>{$p['precio']}</td>
                                <td>{$p['cantidad']}</td>
                            </tr>";
                    }

                    echo "</table>";

                } else {
                    echo "<p>No hay registros</p>";
                }

            } catch(PDOException $e){
                echo "Error al consultar todos: ".$e->getMessage();
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
        <input type="submit" name="consulta" value="Consulta">
    </form>

    <a href="index.php">Volver al menú</a>
</body>
</html>