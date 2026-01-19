<?php
require "conexion.php";
if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nombre, apellido1, apellido2, telefono, correo, contrasenia) VALUES (?, ?, ?, ?, ?, ?)";//Lo correcto es usar placeholders(? o :nombre) que previene inyección SQL y no interpolar las variables directamente
        $stmt = $conexion->prepare($sql);//método de PDO que prepara la consulta para ejecutarla más tarde(analiza sql,verifica que los placeholders sean válidos)
        $stmt->execute([$nombre,$apellido1,$apellido2,$telefono,$correo,$password]);

        echo "Datos insertados correctamente";
    } catch (PDOException $e) {
        die("No se puede insertar datos: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="post">
        Nombre:<br>
        <input type="text" name="nombre"><br>
        Primer apellido:<br>
        <input type="text" name="apellido1"><br>
        Segundo apellido:<br>
        <input type="text" name="apellido2"><br>
        Telefono:<br>
        <input type="text" name="telefono"><br>
        Correo:<br>
        <input type="text" name="correo"><br>
        Contraseña:<br>
        <input type="password" name="password"><br>
        <input type="checkbox" name="crear" require>Al aceptar, permites el uso de cookies según nuestra política de privacidad."<br>
        <input type="submit" value="Registrarse" name="registrar">
    </form>
</body>
</html>