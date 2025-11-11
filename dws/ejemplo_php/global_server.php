<?php
    echo "Ruta dentro de htdocs: ". $_SERVER['PHP_SELF']."<BR>";
    echo "Nombre del servidor: ". $_SERVER['SERVER_NAME']."<BR>";
    echo "Software del servidor: ". $_SERVER['SERVER_SOFTWARE']."<BR>";
    echo "Protocolo: ". $_SERVER['SERVER_PROTOCOL']."<BR>";
    echo "Método de la petición: ". $_SERVER['REQUEST_METHOD']."<BR>";
?>