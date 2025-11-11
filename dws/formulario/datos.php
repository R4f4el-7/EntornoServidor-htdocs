<?php
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    //subir archivo
    if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0){
        $tipo = mime_content_type($_FILES['archivo']['tmp_name']);

        if($tipo !== "text/plain"){
            echo "Solo permiten archivo txt";
        }else{
            if(!is_dir("subidos")){
                mkdir('subidos');
            }
            move_uploaded_file($_FILES['archivo']['tmp.name'], 'subidos/'. basename($_FILES['archivo']['name']));
            echo 'guardado correctamente';
        }
    }
     
?>