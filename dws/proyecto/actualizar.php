<?php
session_start();
require "conexion.php";

if (empty($_SESSION['correo']) || $_SESSION['nombre'] != 'admin') {
    die("Acceso denegado.");
}

//Actualizar libro
if (isset($_POST['actualizar'])) {
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $anio = $_POST['anio_publicacion'];
    $isbn = $_POST['isbn'];

    $sql = "UPDATE libros SET titulo=:titulo, autor=:autor, editorial=:editorial,
            anio_publicacion=:anio, isbn=:isbn
            WHERE id=:id";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':titulo' => $titulo,
        ':autor' => $autor,
        ':editorial' => $editorial,
        ':anio' => $anio,
        ':isbn' => $isbn,
        ':id' => $id
    ]);

    echo "Libro actualizado correctamente.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar libro</title>
</head>
<body>
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

    <a href="index.php">Volver al inicio</a>
</body>
</html>