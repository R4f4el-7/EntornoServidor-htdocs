<?php
session_start();

if (isset($_SESSION['comienzo'])) {
    $tiempoTranscurrido = time() - $_SESSION['comienzo'];//tiempo actual(seg) - tiempoinicial(seg)
    echo "Tiempo transcurrido desde el inicio de la sesión: " . $tiempoTranscurrido . " segundos.<br>";

    //cerrar la sesión cuando sea 20
    if ($tiempoTranscurrido > 20) {
        session_unset();     
        session_destroy();   
        echo "La sesión ha sido cerrada después de 20 segundos.";
    } else {
        echo "La sesión sigue activa.";
    }
} else {
    echo "No hay sesión activa.";
}
?>