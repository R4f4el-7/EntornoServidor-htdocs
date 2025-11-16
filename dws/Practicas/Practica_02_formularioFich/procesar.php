<?php
    //Los datos del formulario
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $exp1 = $_POST["exp1"];
    $exp2 = $_POST["exp2"];
    if( isset($_POST["habilidades"])){
        $habilidades = $_POST["habilidades"];
    }else{
        $habilidades = "Ninguna";
    }


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
        fwrite($archivo, "Nombre: " . $nombre . PHP_EOL);
        fwrite($archivo, "Dirección: " . $direccion . PHP_EOL);
        fwrite($archivo, "Teléfono: " . $telefono . PHP_EOL);
        fwrite($archivo, "Experiencia 1: " . $exp1 . PHP_EOL);
        fwrite($archivo, "Experiencia 2: " . $exp2 . PHP_EOL);
        fwrite($archivo, "Habilidades: " . $habilidades . PHP_EOL);

        fclose($archivo);

    } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    }

    //Lee el contenido línea a línea (fgets)
    if (file_exists($nombreArchivo)) {
        echo "<h3> Contenido del archivo $nombreArchivo:</h3><br>";
        
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