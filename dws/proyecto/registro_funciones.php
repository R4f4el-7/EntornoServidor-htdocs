<?php

function validarRegistro($nombre, $apellido1, $correo, $password) {

    $errores = [];

    if ($nombre === "" || $apellido1 === "" || $correo === "" || $password === "") {
        $errores[] = "Campos obligatorios vacíos";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo inválido";
    }

    if (preg_match('/\d/', $nombre)) {
        $errores[] = "Nombre no puede tener números";
    }

    if (preg_match('/\d/', $apellido1)) {
        $errores[] = "Apellido no puede tener números";
    }

    return $errores;
}
