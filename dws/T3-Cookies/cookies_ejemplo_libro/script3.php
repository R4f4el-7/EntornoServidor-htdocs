<?php
$tiempo_expiracion = 365 * 24 * 3600; // 1 año

// Se agrega el parámetro "/" para que la cookie sea válida en todo el dominio
setcookie("nombre", "Juan", time() + $tiempo_expiracion, "/");

if (isset($_COOKIE["nombre"])) {
    echo "El nombre en cookie es: " . $_COOKIE["nombre"];
}
?>
<html>
<head>
 <meta charset="UTF-8">
 <title>Ejemplo Cookies</title>
</head>
<body>
 <form name="prueba" method="GET" action="CONTROL/cookie1.php">
     <input type="submit" value="Probar"/>
 </form>
</body>
</html>