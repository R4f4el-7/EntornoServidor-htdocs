<?php
session_start();

$_SESSION['nombre'] = $_POST["nombre"];
$_SESSION['rol'] = $_POST["rol"];
$_SESSION['datos'] = array("email" => $_SESSION['nombre'] ."@gmail.com", "edad" => 25);

//Guardamos el momento en que comienza la sesión
if (!isset($_SESSION['comienzo'])) {
    $_SESSION['comienzo'] = time();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión iniciada</title>
</head>
<body>
    <h2>Bienvenido, <?= $_SESSION['nombre'] ?></h2>
    <p>Tu rol es: <?= $_SESSION['rol'] ?></p>
    <p>Email: <?= $_SESSION['datos']['email'] ?></p>
    <p>Edad: <?= $_SESSION['datos']['edad'] ?></p>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>