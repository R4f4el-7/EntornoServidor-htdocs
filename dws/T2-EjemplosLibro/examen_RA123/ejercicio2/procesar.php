<?php
    //Los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $clave = $_POST["clave"];
    $fecha = $_POST["fecha"];
    if( isset($_POST["genero"])){
        $genero = $_POST["genero"];
    }else{
        $genero = "Ninguna";
    }
    $pais = $_POST["pais"];
    $biografia = $_POST["biografia"];

    //Subida del archivo.txt
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0) {
        $tipo = mime_content_type($_FILES['archivo']['tmp_name']);//se determina tipo de archivo, si esta vacio no abrirá
        
        if ($tipo !== "text/plain") {//.txt
            echo "Solo se permiten archivos txt";
        } else {
            if (!is_dir("subidos")) {
                mkdir("subidos");
            }
            move_uploaded_file($_FILES['archivo']['tmp_name'], "subidos/" . basename($_FILES['archivo']['name']));
            echo "Archivo subido correctamente";
        }
    }

    $nombreArchivo = $nombre.".txt";

    try {
    //Se abre o se crea el archivo
    $archivo = fopen($nombreArchivo, "a");
    
    if (!$archivo) {
        throw new Exception("No se pudo crear o abrir el archivo.");
    }

    //Se escriben los datos
    fwrite($archivo, "Nombre: " . $nombre . "|");
    fwrite($archivo, "Email: " . $email . "|");
    fwrite($archivo, "Clave: " . $clave . PHP_EOL);
    fwrite($archivo, "Fecha: " . $fecha . "|");
    fwrite($archivo, "genero: " . $genero . PHP_EOL);
    fwrite($archivo, "pais: " . $pais . PHP_EOL);
    fwrite($archivo, "biografia: " . $biografia . PHP_EOL);

    fclose($archivo);

    } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    }

    //Lee el contenido línea a línea (fgets)
    if (file_exists($nombreArchivo)) {
        echo "<h3> Datos $nombreArchivo:</h3><br>";
        
        $archivo = fopen($nombreArchivo, "r");
        
        while (!feof($archivo)) {
            echo htmlspecialchars(fgets($archivo));
            echo "<br>";
        }
        fclose($archivo);
        echo "<br>";
    } else {
        echo "El archivo no existe.";
    }

    echo "<br><a href='index.php'>Volver al formulario</a>";
?>