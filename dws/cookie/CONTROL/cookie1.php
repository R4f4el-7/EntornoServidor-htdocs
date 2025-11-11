<?php
if (isset($_COOKIE["nombre"])) {
    echo "El nombre en cookie es: " . $_COOKIE["nombre"];
} else {
    echo "No se encontró la cookie.";
}
?>