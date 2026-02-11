<?php
session_start();

echo $_SESSION["nombre"] . "<br>";
echo $_SESSION["correo"] . "<br>";

session_destroy();
setcookie("usuario_cookie", "", time() - 3600, "/");
setcookie("contador_sesiones", "", time() - 3600, "/");

header("Location: index.php");
exit;
?>
