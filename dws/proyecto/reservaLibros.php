<?php
session_start();
require_once "conexion.php";

// Simulación de usuario logueado (para pruebas)
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['usuario_id'] = 1; // admin
}
$usuario_id = $_SESSION['usuario_id'];

// ===============================
// PROCESAR RESERVA
// ===============================
if (isset($_POST['reservar'])) {

    $libro_id = $_POST['libro_id'];

    // Obtener cantidad y asegurar que sea al menos 1
    $cantidad = max(1, intval($_POST['cantidad']));

    // Fecha de préstamo y fecha de devolución (7 días después)
    $fecha_prestamo = date("Y-m-d");
    $fecha_devolucion = date("Y-m-d", strtotime("+7 days"));

    try {
        // Iniciar transacción
        $conexion->beginTransaction();

        // Crear registro en la tabla prestamos
        $stmt = $conexion->prepare(
            "INSERT INTO prestamos (usuario_id, fecha_prestamo)
             VALUES (?, ?)"
        );
        $stmt->execute([$usuario_id, $fecha_prestamo]);
        $prestamo_id = $conexion->lastInsertId();

        // Crear registro en detalles_prestamo con cantidad y fecha de devolución
        $stmt = $conexion->prepare(
            "INSERT INTO detalles_prestamo 
            (prestamo_id, libro_id, cantidad_prestada, fecha_devolucion)
            VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$prestamo_id, $libro_id, $cantidad, $fecha_devolucion]);

        // Confirmar transacción
        $conexion->commit();
        $mensaje = "Reservaste $cantidad libro(s). Devuelve antes del $fecha_devolucion";

    } catch (PDOException $e) {
        // Revertir cambios en caso de error
        $conexion->rollBack();
        $mensaje = "Error al reservar: " . $e->getMessage();
    }
}

// ===============================
// OBTENER LISTADO DE LIBROS
// ===============================
$libros = $conexion->query("SELECT * FROM libros ORDER BY titulo");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservar Libros</title>
    <style>
        body { font-family: Arial; }
        .libro {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }
        img { max-width: 100px; display:block; margin-bottom:10px; }
        button {
            background: #2e86de;
            color: white;
            border: none;
            padding: 8px;
            cursor: pointer;
        }
        .mensaje { 
            background: #d4edda; 
            color: #155724; 
            padding: 10px; 
            margin: 10px 0; 
            border-radius: 5px; 
        }
        input.cantidad { width: 50px; text-align: center; }
    </style>
</head>
<body>

<h1>Catálogo de Libros</h1>

<!-- Mostrar mensaje de éxito o error -->
<?php if (isset($mensaje)) echo "<div class='mensaje'>$mensaje</div>"; ?>

<div class="contenedor">
<?php foreach ($libros as $libro): ?>
    <div class="libro">
        <h3><?= htmlspecialchars($libro['titulo']) ?></h3>
        <p><em><?= htmlspecialchars($libro['autor']) ?></em></p>

        <?php if ($libro['imagen']): ?>
            <img src="<?= $libro['imagen'] ?>" alt="Portada">
        <?php endif; ?>

        <!-- Mostrar resumen de la descripción -->
        <p><?= substr(strip_tags($libro['descripcion']), 0, 120) ?>...</p>

        <!-- Formulario de reserva -->
        <form method="POST">
            <input type="hidden" name="libro_id" value="<?= $libro['id'] ?>">
            Cantidad:<br>
            <input type="text" name="cantidad" value="1" class="cantidad" required>
            <br><br>
            <button type="submit" name="reservar">Reservar</button>
        </form>
    </div>
<?php endforeach; ?>
</div>

<a href="index.php">Ir a inicio</a>
</body>
</html>
