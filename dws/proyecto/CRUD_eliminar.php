<?php
session_start();
require "conexion.php";

// Solo admin
if (empty($_SESSION['correo']) || $_SESSION['nombre'] !== 'admin') {
    die("Acceso denegado");
}

// Obtener libros para el SELECT
$stmtLibros = $conexion->query("SELECT id, titulo FROM libros ORDER BY titulo");
$libros = $stmtLibros->fetchAll(PDO::FETCH_ASSOC);

$mensaje = "";

// ========================
// ELIMINAR LIBRO
// ========================
if (isset($_POST["eliminar"])) {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
        $mensaje = "Libro inválido";
    } else {

        try {

            // Verificar si hay préstamos activos
            $stmt = $conexion->prepare("SELECT COUNT(*) FROM detalles_prestamo WHERE libro_id = ?");
            $stmt->execute([$id]);
            $cantidad = $stmt->fetchColumn();

            if ($cantidad > 0) {
                $mensaje = "No se puede eliminar el libro porque tiene préstamos asociados ($cantidad).";
            } else {
                // proceder a eliminar
                $stmt = $conexion->prepare("DELETE FROM libros WHERE id = ?");
                $stmt->execute([$id]);
                $mensaje = "Libro eliminado correctamente.";
            }
            
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="cuadroRetro">
        <h2>Eliminar libro</h2>

        <?php if ($mensaje) : ?>
            <p><?= $mensaje ?></p>
        <?php endif; ?>

        <form method="post">

            <label for="id">Libro:</label><br>
            <select name="id" id="id" required>
                <option value="">-- Selecciona un libro --</option>

                <?php foreach ($libros as $l) : ?>
                    <option value="<?= $l['id'] ?>">
                        <?= htmlspecialchars($l['titulo']) ?>
                    </option>
                <?php endforeach; ?>

            </select>
            <br><br>

            <input type="submit" name="eliminar" value="Eliminar libro">
        </form>
    </div>

    <a href="index.php">Volver al menú</a>

</body>
</html>

