<?php
session_start();
require "conexion.php";
//Determinar acción según formulario
$accion = '';
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $accion = 'consulta';
} elseif (isset($_POST['mostrar_todos'])) {
    $accion = 'todos';
}
//Consulta por ID
if($accion == 'consulta'){
    $id = $_POST['id'];
    if(!is_numeric($id) || $id <= 0){
        echo "<p>ID inválido</p>";
    } else {
        try {
            $stmt = $conexion->prepare("SELECT * FROM libros WHERE id = ?");
            $stmt->execute([$id]);
            $libro = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($libro) {
                echo "<h3>Detalles del libro</h3>";
                echo "<p><strong>Título:</strong> {$libro['titulo']}<br>";
                echo "<strong>Autor:</strong> {$libro['autor']}<br>";
                echo "<strong>Editorial:</strong> {$libro['editorial']}<br>";
                echo "<strong>Año de publicación:</strong> {$libro['anio_publicacion']}<br>";
                echo "<strong>ISBN:</strong> {$libro['isbn']}<br>";
                echo "<strong>Descripción:</strong> {$libro['descripcion']}<br>";
                if (!empty($libro['imagen'])) {
                    echo "<img src='{$libro['imagen']}' alt='Imagen libro' style='max-width:150px;'><br>";
                }
                echo "</p>";
            } else {
                echo "<p>No se encontró el libro</p>";
            }
        } catch(PDOException $e){
            echo "Error al consultar: ".$e->getMessage();
        }
    }
}
//Mostrar todas las personasx
if($accion == 'todos'){
    try {
        $stmt = $conexion->query("SELECT id, titulo, autor FROM libros");
        $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($personas) > 0){
            echo "<h3>Lista de todos los libros</h3>";
            echo "<table border='1' cellpadding='5'>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>autor</th>
                    </tr>";

            foreach($personas as $p){
                echo "<tr>
                        <td>{$p['id']}</td>
                        <td>{$p['nombre']}</td>
                        <td>{$p['apellido']}</td>
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
    <title>Colsulta de libro</title>
</head>
<body>
    <!-- FORMULARIO -->
    <form action="consulta.php" method="post">
        Id:<br><input type="text" name="id"><br>
        <input type="submit" value="Consultar">
    </form>
    
    <!-- BOTÓN MOSTRAR TODOS -->
    <form action="consulta.php" method="post" style="margin-top:10px;">
        <input type="submit" value="Mostrar todos">
    </form>

    <a href="index.php">Volver al menú</a>
</body>
</html>
