<?php
session_start();
require "conexion.php";

//Solo el admin puede insertar
if (empty($_SESSION['correo']) || $_SESSION['nombre'] != 'admin') {
    die("Acceso denegado");
}

if (isset($_POST['guardar'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $anio = $_POST['anio_publicacion'];
    $isbn = $_POST['isbn'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO libros 
            (titulo, autor, editorial, anio_publicacion, isbn, descripcion, imagen)
            VALUES (:titulo, :autor, :editorial, :anio, :isbn, :descripcion, :imagen)";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':editorial', $editorial);
    $stmt->bindParam(':anio', $anio);
    $stmt->bindParam(':isbn', $isbn);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':imagen', $imagen);

    if ($stmt->execute()) {
        echo "Libro insertado correctamente.";
    } else {
        echo "Error al insertar libro.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar libros</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="cuadroRetro">
        <h2>Insertar libro</h2>
        <form action="insertar.php" method="post">
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
            Imagen (URL):<br>
            <input type="text" name="imagen"><br>

            <input type="submit" name="guardar" value="Guardar">
        </form>
    </div>

    <a href="index.php">Volver al inicio</a>
</body>
</html>
