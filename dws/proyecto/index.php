<?php
session_start();
require "conexion.php";

if(isset($_POST["iniciar"])){
    $opcion = intval($_POST["opcion"]);//convierte cualquier valor a un número entero.Si el valor no es numérico, devuelve 0.

if($opcion >= 1 && $opcion <= 6){
    switch($opcion){
        case 1: header("Location: CRUD_insertar.php"); break;
        case 2: header("Location: CRUD_actualizar.php"); break;
        case 3: header("Location: CRUD_eliminar.php"); break;
        case 4: header("Location: CRUD_consulta.php"); break;
    }
    exit;
} else {
    echo "Opción no válida";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h2>Biblioteca</h2>
    <?php if (!empty($_SESSION['correo']) && $_SESSION['nombre'] == "admin"): ?>
        <div class="cuadroRetro_2">
            <h3>Buenos días <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>

            <h4>1.Insertar</h4>
            <h4>2.Actualizar</h4>
            <h4>3.Borrar</h4>
            <h4>4.consulta</h4>

            <form action="index.php" method="post">
                <h3>Elige opcion(ej.1,2,3...)</h3>
                <input type="text" name="opcion">
                <input type="submit" name="iniciar" value="aceptar">
            </form>
        </div>

        <a href="logout.php">Cerrar sesión</a><br>
        <a href="reservaLibros.php">Ir a reservar libros</a>

    <?php elseif (!empty($_SESSION['correo'])): ?>
        <div class="cuadroRetro_2">
            <h3>Buenos días <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>
        </div>

        <a href="logout.php">Cerrar sesión</a><br>
        <a href="reservaLibros.php">Ir a reservar libros</a>
    <?php else: ?>
        <div class="cuadroRetro">
            <h3>No has iniciado sesión</h3>
        </div>
        <a href="login.php">Iniciar sesión</a><br>
        <a href="registro.php">Registrarse</a><br>
    <?php endif; ?>

    
</body>
</html>