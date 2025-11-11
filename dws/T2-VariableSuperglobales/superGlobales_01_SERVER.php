<?php
//Claves de la variable superglobal(el cual es un array asociativo), $_SERVER
echo "Ruta del script: ".$_SERVER['PHP_SELF']."<br>";//La ruta del script PHP actual (desde la raíz del sitio web).
echo "Nombre del servidor: ".$_SERVER['SERVER_NAME']."<br>";//El nombre del servidor donde se ejecuta el script.
echo "Host: ".$_SERVER['HTTP_HOST']."<br>";//El host que envió el navegador en la cabecera HTTP.
echo "URL de referencia: ".$_SERVER['HTTP_REFERER']."<br>";//La URL de la página desde la que el usuario llegó (el referente).
echo "Info sobre  navegador, sistema operativo y dispositivo del usuario: ".$_SERVER['HTTP_USER_AGENT']."<br>";//Información sobre el navegador, sistema operativo y dispositivo del usuario.
echo "Ruta del script(mas seguro): ".$_SERVER['SCRIPT_NAME']."<br>";//El nombre del script actual, similar a PHP_SELF pero más seguro.

/**Parte	    Nombre correcto	                  Ejemplo
$_SERVER	    Array superglobal	              Contenedor de pares clave–valor
'HTTP_HOST'	    Clave o índice	                  Tipo: string
'localhost'	    Valor asociado a esa clave	      Tipo: string */