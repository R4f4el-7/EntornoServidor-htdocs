<?php
session_start();
require "conexion.php";

// Solo admin
if (empty($_SESSION['correo']) || $_SESSION['nombre'] !== 'admin') {
    die("Acceso denegado.");
}

if (isset($_POST['actualizar'])) {

    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $anio = $_POST['anio_publicacion'];
    $isbn = $_POST['isbn'];
    $descripcion = $_POST['descripcion'];

    if ($id <= 0) {
        die("ID inválido");
    }

    try {
        $sql = "UPDATE libros 
                SET titulo = :titulo,
                    autor = :autor,
                    editorial = :editorial,
                    anio_publicacion = :anio,
                    isbn = :isbn,
                    descripcion = :descripcion
                WHERE id = :id";

        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':editorial' => $editorial,
            ':anio' => $anio,
            ':isbn' => $isbn,
            ':descripcion' => $descripcion,
            ':id' => $id
        ]);

        if ($stmt->rowCount() > 0) {
            echo "Libro actualizado correctamente.";
        } else {
            echo "No se encontró el libro o no hubo cambios.";
        }

    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="cuadroRetro">
        <h2>Actualizar libro</h2>
        <form action="actualizar.php" method="post">
            Id:<br>
            <input type="text" name="id"><br>  
            Título:<br>
            <input type="text" name="titulo" required><br>
            Autor:<br>
            <input type="text" name="autor" required><br>
            Editorial:<br>
            <input type="text" name="editorial"><br>
            Año de publicación:<br>
            <input type="text" name="anio_publicacion"><br>
            ISBN:<br>
            <input type="text" name="isbn"><br>
            Descripción:<br>
            <textarea name="descripcion"></textarea><br>

            <input type="submit" name="actualizar" value="Actualizar">
        </form>
    </div>

    <a href="index.php">Volver al inicio</a>
</body>
</html>