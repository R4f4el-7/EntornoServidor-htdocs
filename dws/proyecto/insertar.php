<?php
session_start();
require "conexion.php";

// Solo admin
if (empty($_SESSION['correo']) || $_SESSION['nombre'] !== 'admin') {
    die("Acceso denegado");
}

$errores = [];
$mensajeExito = "";

if (isset($_POST['guardar'])) {

    //Limpiar datos
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $editorial = trim($_POST['editorial']);
    $anio = trim($_POST['anio_publicacion']);
    $isbn = trim($_POST['isbn']);
    $descripcion = trim($_POST['descripcion']);

    /*VALIDACIONES*/

    if (empty($titulo)) $errores[] = "El TÍTULO es obligatorio.";
    if (empty($autor)) $errores[] = "El AUTOR es obligatorio.";
    if (empty($isbn)) $errores[] = "El ISBN es obligatorio.";
    if (empty($descripcion)) $errores[] = "La DESCRIPCIÓN es obligatoria.";

    //Año de publicación
    if (!empty($anio)) {
        if (!preg_match('/^\d{4}$/', $anio)) {
            $errores[] = "El AÑO debe contener exactamente 4 dígitos (ej: 2024).";
        } else {
            $anioNum = intval($anio);
            $anioActual = date('Y');
            if ($anioNum < 1400 || $anioNum > $anioActual + 1) {
                $errores[] = "El AÑO debe estar entre 1400 y " . ($anioActual + 1) . ".";
            }
        }
    }

    //ISBN: solo números, longitud válida
    if (!empty($isbn)) {
        if (!ctype_digit($isbn)) {
            $errores[] = "El ISBN solo puede contener NÚMEROS.";
        } elseif (strlen($isbn) != 10 && strlen($isbn) != 13) {
            $errores[] = "El ISBN debe tener 10 o 13 dígitos.";
        }
    }

    //Imagen (opcional)
    $rutaImagen = null;
    $imagenValida = false;

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {

        $permitidos = ['jpg','jpeg','png','webp'];
        $nombreImagen = $_FILES['imagen']['name'];
        $tamano = $_FILES['imagen']['size'];
        $tmp = $_FILES['imagen']['tmp_name'];
        $extension = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));

        //Validaciones
        if (!in_array($extension, $permitidos)) {
            $errores[] = "Formato de imagen NO permitido. Solo: jpg, jpeg, png, webp.";
        }

        if ($tamano > 2 * 1024 * 1024) {
            $errores[] = "La imagen es demasiado grande. Máximo: 2MB.";
        }

        //Si pasa validaciones, marcamos como lista para guardar
        if (empty($errores)) {
            $imagenValida = true;
            $carpeta = "img/";

            if (!is_dir($carpeta)) {
                mkdir($carpeta, 0777, true);
            }

            $nuevoNombre = uniqid("libro_") . "." . $extension;
            $rutaImagen = $carpeta . $nuevoNombre;
        }
    }

    /* ===============================
       GUARDAR EN BASE DE DATOS
       =============================== */
    if (empty($errores)) {
        // Mover imagen solo si todo es válido
        if ($imagenValida) {
            move_uploaded_file($tmp, $rutaImagen);
        }
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
            $mensajeExito = "El libro se ha insertado correctamente.";
        } else {
            $errores[] = "Ocurrió un error al insertar el libro en la base de datos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="cuadroRetro">
    <h2>Insertar libro</h2>

    <?php if (!empty($errores)) : ?>
        <div style="color:red;">
            <ul>
                <?php foreach ($errores as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($mensajeExito) : ?>
        <div><?= $mensajeExito ?></div>
    <?php endif; ?>

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

        Imagen (opcional):<br>
        <input type="file" name="imagen" accept=".jpg,.jpeg,.png,.webp"><br><br>

        <input type="submit" name="guardar" value="Guardar">
    </form>
</div>

<a href="index.php">Volver al inicio</a>

</body>
</html>
