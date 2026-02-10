<?php
require "conexion.php";

$mensaje = "";

if (isset($_POST["registrar"])) {

    $nombre = trim($_POST["nombre"]);
    $apellido1 = trim($_POST["apellido1"]);
    $apellido2 = trim($_POST["apellido2"]);
    $telefono = trim($_POST["telefono"]);
    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];
    $cookies = isset($_POST["crear"]);

    $errores = [];

    //=====VALIDACIONES=====

    //Nombre obligatorio y solo letras
    if ($nombre === "") {
        $errores[] = "El nombre es obligatorio.";
    } elseif (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $nombre)) {
        $errores[] = "El nombre solo puede contener letras.";
    }

    //Apellido1 obligatorio y solo letras
    if ($apellido1 === "") {
        $errores[] = "El primer apellido es obligatorio.";
    } elseif (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $apellido1)) {
        $errores[] = "El primer apellido solo puede contener letras.";
    }

    //Apellido2 opcional pero si existe solo letras
    if ($apellido2 !== "" && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $apellido2)) {
        $errores[] = "El segundo apellido solo puede contener letras.";
    }

    //Email
    if ($correo === "") {
        $errores[] = "El correo es obligatorio.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo no es válido.";
    }

    //Teléfono opcional pero si existe 9 números
    if ($telefono !== "" && !preg_match('/^[0-9]{9}$/', $telefono)) {
        $errores[] = "El teléfono debe tener exactamente 9 números.";
    }

    //Password
    if ($password === "") {
        $errores[] = "La contraseña es obligatoria.";
    } elseif (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener mínimo 6 caracteres.";
    }

    //Checkbox cookies
    if (!$cookies) {
        $errores[] = "Debes aceptar la política de privacidad.";
    }

    //=====COMPROBAR CORREO DUPLICADO=====
    if (empty($errores)) {

        $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);

        if ($stmt->fetch()) {
            $errores[] = "Este correo ya está registrado.";
        }
    }

    //=====INSERTAR=====
    if (empty($errores)) {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        try {

            $sql = "INSERT INTO usuarios
                    (nombre, apellido1, apellido2, telefono, correo, contrasenia)
                    VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                $nombre,
                $apellido1,
                $apellido2,
                $telefono,
                $correo,
                $password_hash
            ]);

            $mensaje = "Usuario registrado correctamente.";

        } catch (PDOException $e) {
            $mensaje = "Error al registrar: " . $e->getMessage();
        }

    } else {
        $mensaje = implode("<br>", $errores);
    }
}
require "registro_funciones.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h2>Registro</h2>

<?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>

<form method="post">

    Nombre:<br>
    <input type="text" name="nombre" required><br>

    Primer apellido:<br>
    <input type="text" name="apellido1" required><br>

    Segundo apellido:<br>
    <input type="text" name="apellido2"><br>

    Teléfono:<br>
    <input type="text" name="telefono"><br>

    Correo:<br>
    <input type="email" name="correo" required><br>

    Contraseña:<br>
    <input type="password" name="password" required><br>

    <label>
        <input type="checkbox" name="crear" required>
        Acepto la política de privacidad
    </label>

    <br><br>

    <input type="submit" value="Registrarse" name="registrar">

</form>

<a href="index.php">Ir a inicio</a>

</body>
</html>
