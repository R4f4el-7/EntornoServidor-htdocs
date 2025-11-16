<?php 
require("db.php");

$opcion = intval($_POST["opcion"]);//convierte cualquier valor a un número entero.Si el valor no es numérico, devuelve 0.

if($opcion >= 1 && $opcion <= 4){
    switch($opcion){
        case 1: header("Location: insertar.php"); break;
        case 2: header("Location: actualizar.php"); break;
        case 3: header("Location: eliminar.php"); break;
        case 4: header("Location: consulta.php"); break;
    }
    exit;
} else {
    echo "Opción no válida";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>1.Insertar</h4>
    <h4>2.Actualizar</h4>
    <h4>3.Borrar</h4>
    <h4>4.consulta</h4>

    <form action="index.php" method="post">
        <h3>Elige opcion(ej.1,2,3...)</h3>
        <input type="text" name="opcion">
        <input type="submit" name="iniciar" value="aceptar">
    </form>
</body>
</html>