<?php
//Consultar todos
    try {
        $stmt = $conexion->query("SELECT nombre, apellido1, apellido2, telefono, correo, contrasenia FROM usuarios");
        $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($personas) > 0){
            foreach($personas as $p){
                if($_POST["usuario"] = $p['nombre']){
                    echo 'El usuario esta registrado';
                }
            }
        } else {
            echo "<p>No hay registros</p>";
        }

    } catch(PDOException $e){
        echo "Error al consultar todos: ".$e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        Usuario:<br>
        <input type="text" name="usuario"><br>
        Contraseña:<br>
        <input type="password" name="password"><br>
        <input type="checkbox" name="crear" require>Al aceptar, permites el uso de cookies según nuestra política de privacidad."<br>
        <input type="submit" value="login" name="login">
    </form>
</body>
</html>
