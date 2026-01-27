<?php
session_start();
require "conexion.php";

if (isset($_POST['login'])) {

    if (empty($_POST['usuario']) || empty($_POST['password'])) {
        $error = "Todos los campos son obligatorios";
    } elseif (!isset($_POST['crear'])) {
        $error = "Debes aceptar la política de cookies";
    } else {

        $sql = "SELECT * FROM usuarios WHERE nombre = :usuario LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":usuario", $_POST['usuario']);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Comparar contraseña del formulario con la de la BD
        if ($usuario && password_verify($_POST['password'], $usuario['contrasenia'])) {

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            if (isset($_POST['crear'])) {
                setcookie("usuario_cookie", $usuario['nombre'],time() + 86400, "/");
            }

            header("Location: index.php");
            exit;

        } else {
            $error = "Usuario o contraseña incorrectos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post">
        Usuario:<br>
        <input type="text" name="usuario" required><br>

        Contraseña:<br>
        <input type="password" name="password" required><br>

        <input type="checkbox" name="crear" required>
        Acepto la política de cookies<br><br>

        <input type="submit" value="Login" name="login">
    </form>
    <a href="index.php">Ir a inicio</a>
</body>
</html>
