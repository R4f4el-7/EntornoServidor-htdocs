<?php
session_start();
require "conexion.php";

// Solo admin
if (empty($_SESSION['correo']) || $_SESSION['nombre'] !== 'admin') {
    die("Acceso denegado");
}

$errores = [];

if (isset($_POST['guardar'])) {

    //Limpiar datos
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $editorial = trim($_POST['editorial']);
    $anio = trim($_POST['anio_publicacion']);
    $isbn = trim($_POST['isbn']);
    $descripcion = trim($_POST['descripcion']);

    //Validaciones campos obligatorios
    if (empty($titulo)) $errores[] = "El título es obligatorio";
    if (empty($autor)) $errores[] = "El autor es obligatorio";
    if (empty($isbn)) $errores[] = "El ISBN es obligatorio";
    if (empty($descripcion)) $errores[] = "La descripción es obligatoria";

    //Año solo números
    if (!empty($anio) && !preg_match('/^\d{4}$/', $anio)) {
        $errores[] = "El año debe tener 4 dígitos";
    }

    //ISBN formato básico
    if (!preg_match('/^[0-9\-]+$/', $isbn)) {
        $errores[] = "El ISBN solo puede contener números y guiones";
    }

    /* ===== Validación imagen ===== */
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== 0) {
        $errores[] = "La imagen es obligatoria";
    } else {

        $permitidos = ['jpg', 'jpeg', 'png', 'webp'];
        $nombreImagen = $_FILES['imagen']['name'];
        $tamano = $_FILES['imagen']['size'];
        $tmp = $_FILES['imagen']['tmp_name'];

        $extension = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));

        if (!in_array($extension, $permitidos)) {
            $errores[] = "Formato de imagen no permitido";
        }

        if ($tamano > 2 * 1024 * 1024) {
            $errores[] = "La imagen supera los 2MB";
        }
    }

    //Si no hay errores entonces guardar
    if (empty($errores)) {

        $carpeta = "img/";
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        $nuevoNombre = uniqid("libro_") . "." . $extension;
        $rutaImagen = $carpeta . $nuevoNombre;

        move_uploaded_file($tmp, $rutaImagen);

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
        $stmt->bindParam(':imagen', $rutaImagen);

        if ($stmt->execute()) {
            echo "Libro insertado correctamente";
        } else {
            echo "Error al insertar libro";
        }

    } else {
        foreach ($errores as $error) {
            echo "$error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar libros</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="cuadroRetro">
    <h2>Insertar libro</h2>

    <form action="insertar.php" method="post" enctype="multipart/form-data">
        Título:<br>
        <input type="text" name="titulo" required><br>

        Autor:<br>
        <input type="text" name="autor" required><br>

        Editorial:<br>
        <input type="text" name="editorial"><br>

        Año de publicación:<br>
        <input type="text" name="anio_publicacion"><br>

        ISBN:<br>
        <input type="text" name="isbn" required><br>

        Descripción:<br>
        <textarea name="descripcion" required></textarea><br>

        Imagen:<br>
        <input type="file" name="imagen" accept=".jpg,.jpeg,.png,.webp" required><br><br>

        <input type="submit" name="guardar" value="Guardar">
    </form>
</div>

<a href="index.php">Volver al inicio</a>

</body>
</html>
