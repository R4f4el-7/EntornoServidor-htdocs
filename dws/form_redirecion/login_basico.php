 <?php
 echo "Usuario introducido: ". $_POST['usuario']. "<br>";
 echo "Clave introducida: ". $_POST['clave'];

if(isset ($_POST['enviar'])){
   $nombre = $_POST['nombre'];
   setcookie('cookie1', $nombre, time() + 30*24*60*60);
   echo "El valor de la cookie nombre de la cookie es: " . $_COOKIE['cookie1'];
}

 if ($_POST['usuario'] == 'usuario' and $_POST['clave'] == '1234'){
    header("Location:bienvenido.html");
 }else{
    header("Location:error.html");
 }

 ?>