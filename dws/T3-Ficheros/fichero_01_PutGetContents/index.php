<?php
//Crea el archivo si no existe.
if(isset($_POST['crear'])){
    if(!file_exists('archivo.txt')){
        file_put_contents('archivo.txt', "Contenido inicial");
        echo "Archivo creado.";
    } else {
    echo "El archivo ya existe.";
    }
}
//Sobrescribir contenido
if(isset($_POST['sobrescribir'])){
    file_put_contents('archivo.txt', "Nuevo contenido");
    echo "Contenido sobrescrito.";
}
//Añadir contenido sin borrar lo anterior
if(isset($_POST['agregar'])){
    file_put_contents('archivo.txt', "\nLínea extra", FILE_APPEND);
    echo "Contenido añadido.";
}
//Leer todo el contenido
if(isset($_POST['leer'])){
    $contenido = file_get_contents("archivo.txt");
    echo $contenido;
}
//Leer línea por línea
if(isset($_POST['leerlinea'])){
    $archivo = fopen("archivo.txt", "r");

    while(!feof($archivo)) {
        echo fgets($archivo) . "<br>";//todo el texto hasta el siguiente salto de línea \n
    }

    fclose($archivo);
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
    <form method="post">
        <button name="crear">Crear archivo si no existe</button>
        <button name="sobrescribir">Sobrescribir contenido</button>
        <button name="agregar">Añadir contenido</button>
        <button name="leer">Leer todo el contenido</button>
        <button name="leerlinea">Leer línea por línea</button>
    </form>
</body>
</html>