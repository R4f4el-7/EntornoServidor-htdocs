<?php 
//Crear o sobrescribir
if(isset($_POST["escribir"])){
    $archivo = fopen("archivo.txt", "w"); 
    fwrite($archivo, "Hola mundo\n");
    fclose($archivo);
}

//Añadir contenido
if(isset($_POST["sobreescribir"])){
    $archivo = fopen("archivo.txt", "a"); 
    fwrite($archivo, "Otra línea\n");
    fclose($archivo);
}

//Leer archivo
if(isset($_POST["leer"])){
    if (file_exists("archivo.txt")) { 
        $archivo = fopen("archivo.txt", "r"); 
        $contenido = fread($archivo, filesize("archivo.txt")); //necesita saber cuántos bytes debe leer, por eso se usa filesize()
        fclose($archivo);

        echo nl2br($contenido);
    } else {
        echo "No existe.";
    }
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
        <button name="escribir">Crear o abrir para escribir</button>
        <button name="sobreescribir">Abrir para añadir contenido</button>
        <button name="leer">Abrir para leer</button>
    </form>
</body>
</html>
