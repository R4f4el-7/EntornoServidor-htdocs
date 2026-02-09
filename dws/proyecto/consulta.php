<?php
session_start();
require "conexion.php";

// Obtener todos los libros para el SELECT
$stmtLibros = $conexion->query("SELECT id, titulo FROM libros ORDER BY titulo");
$librosSelect = $stmtLibros->fetchAll(PDO::FETCH_ASSOC);

// Determinar acción
$accion = '';

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $accion = 'consulta';
} elseif (isset($_POST['mostrar_todos'])) {
    $accion = 'todos';
}


// ========================
// CONSULTA POR SELECT
// ========================
if ($accion == 'consulta') {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
        echo "<p>ID inválido</p>";
    } else {
        try {

            $stmt = $conexion->prepare("SELECT * FROM libros WHERE id = ?");
            $stmt->execute([$id]);
            $libro = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($libro) {

                echo "<h3>Detalles del libro</h3>";
                echo "<p>
                <strong>Título:</strong> ".htmlspecialchars($libro['titulo'])."<br>
                <strong>Autor:</strong> ".htmlspecialchars($libro['autor'])."<br>
                <strong>Editorial:</strong> ".htmlspecialchars($libro['editorial'])."<br>
                <strong>Año de publicación:</strong> ".htmlspecialchars($libro['anio_publicacion'])."<br>
                <strong>ISBN:</strong> ".htmlspecialchars($libro['isbn'])."<br>
                <strong>Descripción:</strong> ".htmlspecialchars($libro['descripcion'])."<br>";

                if (!empty($libro['imagen'])) {
                    echo "<img src='".htmlspecialchars($libro['imagen'])."' style='max-width:150px;'><br>";
                }

                echo "</p>";

            } else {
                echo "<p>No se encontró el libro</p>";
            }

        } catch (PDOException $e) {
            echo "Error al consultar: " . $e->getMessage();
        }
    }
}


// ========================
// MOSTRAR TODOS
// ========================
if ($accion == 'todos') {

    try {

        $stmt = $conexion->query("SELECT id, titulo, autor FROM libros");
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($libros) > 0) {

            echo "<h3>Lista de todos los libros</h3>";
            echo "<table border='1' cellpadding='5'>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                    </tr>";

            foreach ($libros as $l) {
                echo "<tr>
                        <td>".htmlspecialchars($l['id'])."</td>
                        <td>".htmlspecialchars($l['titulo'])."</td>
                        <td>".htmlspecialchars($l['autor'])."</td>
                    </tr>";
            }

            echo "</table>";

        } else {
            echo "<p>No hay registros</p>";
        }

    } catch (PDOException $e) {
        echo "Error al consultar todos: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de libros</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <div class="cuadroRetro">

        <h2>Consultar libro</h2>

        <!-- SELECT LIBRO -->
        <form method="post">
            Libro:<br>
            <select name="id" required>
                <option value="">-- Selecciona un libro --</option>
                <?php foreach ($librosSelect as $l): ?>
                    <option value="<?= $l['id'] ?>">
                        <?= htmlspecialchars($l['titulo']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br><br>
            <input type="submit" value="Consultar">
        </form>

        <!-- BOTÓN MOSTRAR TODOS -->
        <form method="post" style="margin-top:10px;">
            <input type="submit" name="mostrar_todos" value="Mostrar todos">
        </form>

    </div>

    <a href="index.php">Volver al menú</a>

</body>
</html>

