<?php
session_start();
require "conexion.php";

// Solo admin
if (empty($_SESSION['correo']) || $_SESSION['nombre'] !== 'admin') {
    die("Acceso denegado.");
}

// Obtener libros para select
$stmtLibros = $conexion->query("SELECT * FROM libros ORDER BY titulo");
$libros = $stmtLibros->fetchAll(PDO::FETCH_ASSOC);

// Variables para rellenar formulario
$libroSeleccionado = null;
$mensaje = "";

// ======================
// SELECCIONAR LIBRO
// ======================
if (isset($_POST['seleccionar'])) {

    $idSelect = filter_input(INPUT_POST, 'id_select', FILTER_VALIDATE_INT);

    if ($idSelect) {
        $stmt = $conexion->prepare("SELECT * FROM libros WHERE id = ?");
        $stmt->execute([$idSelect]);
        $libroSeleccionado = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// ======================
// ACTUALIZAR LIBRO
// ======================
if (isset($_POST['actualizar'])) {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $editorial = trim($_POST['editorial']);
    $anio = trim($_POST['anio_publicacion']);
    $isbn = trim($_POST['isbn']);
    $descripcion = trim($_POST['descripcion']);

    $errores = [];

    //Validaciones
    if (!$id) $errores[] = "Libro inválido.";
    if (empty($titulo)) $errores[] = "El TÍTULO es obligatorio.";
    if (empty($autor)) $errores[] = "El AUTOR es obligatorio.";
    if (empty($descripcion)) $errores[] = "La DESCRIPCIÓN es obligatoria.";

    //Año de publicación
    if (!empty($anio)) {
        if (!preg_match('/^\d{4}$/', $anio)) {
            $errores[] = "El AÑO debe tener 4 dígitos (ej: 2024).";
        } else {
            $anioNum = intval($anio);
            $anioActual = date('Y');
            if ($anioNum < 1400 || $anioNum > $anioActual + 1) {
                $errores[] = "El AÑO debe estar entre 1400 y " . ($anioActual + 1) . ".";
            }
        }
    }

    // ISBN: solo números, longitud 10 o 13
    if (!empty($isbn)) {
        if (!ctype_digit($isbn)) {
            $errores[] = "El ISBN solo puede contener NÚMEROS.";
        } elseif (strlen($isbn) != 10 && strlen($isbn) != 13) {
            $errores[] = "El ISBN debe tener 10 o 13 dígitos.";
        }
    }

    // Mostrar errores o actualizar
    if ($errores) {
        $mensaje = "<ul style='color:red;'>";
        foreach ($errores as $error) {
            $mensaje .= "<li>$error</li>";
        }
        $mensaje .= "</ul>";
    } else {
        try {
            $sql = "UPDATE libros SET
                        titulo = :titulo,
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
                $mensaje = "Libro actualizado correctamente.</span>";
            } else {
                $mensaje = "No hubo cambios.</span>";
            }

        } catch (PDOException $e) {
            $mensaje = "Error: " . $e->getMessage() . "</span>";
        }
    }

    // Volver a cargar datos actualizados
    if ($id) {
        $stmt = $conexion->prepare("SELECT * FROM libros WHERE id = ?");
        $stmt->execute([$id]);
        $libroSeleccionado = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <div class="cuadroRetro">
        <h2>Actualizar libro</h2>

        <?php if ($mensaje) echo "<p>$mensaje</p>"; ?>

        <!--SELECT LIBRO-->
        <form method="post">
            Libro:<br>
            <select name="id_select" required>
                <option value="">-- Selecciona un libro --</option>

                <?php foreach ($libros as $libro): ?>
                    <option value="<?= $libro['id'] ?>"
                    <?php if ($libroSeleccionado && $libroSeleccionado['id'] == $libro['id']) echo "selected";?>
                    >
                        <?= htmlspecialchars($libro['titulo']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br><br>
            <input type="submit" name="seleccionar" value="Cargar datos">
        </form>

        <hr>

        <!--ACTUALIZAR-->
        <?php if ($libroSeleccionado): ?>

            <form method="post">

                <input type="hidden" name="id" value="<?= $libroSeleccionado['id'] ?>">

                Título:<br>
                <input type="text" name="titulo"
                value="<?= htmlspecialchars($libroSeleccionado['titulo']) ?>" required><br>

                Autor:<br>
                <input type="text" name="autor"
                value="<?= htmlspecialchars($libroSeleccionado['autor']) ?>" required><br>

                Editorial:<br>
                <input type="text" name="editorial"
                value="<?= htmlspecialchars($libroSeleccionado['editorial']) ?>"><br>

                Año:<br>
                <input type="text" name="anio_publicacion"
                value="<?= htmlspecialchars($libroSeleccionado['anio_publicacion']) ?>"><br>

                ISBN:<br>
                <input type="text" name="isbn"
                value="<?= htmlspecialchars($libroSeleccionado['isbn']) ?>"><br>

                Descripción:<br>
                <textarea name="descripcion"><?= htmlspecialchars($libroSeleccionado['descripcion']) ?></textarea><br><br>

                <input type="submit" name="actualizar" value="Actualizar libro">

            </form>

        <?php endif; ?>
    </div>

    <a href="index.php">Volver al inicio</a>

</body>
</html>
