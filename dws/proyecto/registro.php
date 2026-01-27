<?php
require "conexion.php";
if(isset($_POST["registrar"])){
    $nombre = trim($_POST["nombre"]);
    $apellido1 = trim($_POST["apellido1"]);
    $apellido2 = trim($_POST["apellido2"]);
    $telefono = trim($_POST["telefono"]);
    $correo = trim($_POST["correo"]);
    $password = $_POST['password'];

    //Validaciones básicas
        if($nombre === "" || $apellido1 === "" || $correo === "" || $password === ""){
            echo "Por favor completa todos los campos obligatorios.";
        } elseif(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            echo "El correo no tiene un formato válido.";
        }else{
            //Hashear contraseña
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            try {
                $sql = "INSERT INTO usuarios (nombre, apellido1, apellido2, telefono, correo, contrasenia) VALUES (?, ?, ?, ?, ?, ?)";//Lo correcto es usar placeholders(? o :nombre) que previene inyección SQL y no interpolar las variables directamente
                $stmt = $conexion->prepare($sql);//método de PDO que prepara la consulta para ejecutarla más tarde(analiza sql,verifica que los placeholders sean válidos)
                $stmt->execute([$nombre,$apellido1,$apellido2,$telefono,$correo,$password]);

                echo "Datos insertados correctamente";
            } catch (PDOException $e) {
                die("No se puede insertar datos: " . $e->getMessage());
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilos.css">
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
    <a href="index.php">Ir a inicio</a>
</body>
</html>