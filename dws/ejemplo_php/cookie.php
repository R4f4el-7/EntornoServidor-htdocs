<?php
if(isset ($_POST['enviar'])){
   $nombre = $_POST['nombre'];
   setcookie('cookie1', $nombre, time() + 30*24*60*60);
   echo "El valor de la cookie nombre de la cookie es: " . $_COOKIE['cookie1'];
}
setcookie('cookie1', 1, time() + 60 );
header("Location: cookie_leer_2.php");
?>