<?php
    session_start();

    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['contrasena'] = $_POST['contrasena'];
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Boletas</title>
    <link rel='stylesheet' href='css/boletas.css'> 
</head>
<body>
    <p>El usuario <?php echo $_SESSION['usuario']?> ha iniciado sesion</p>
    <form action="contador.php" method="post">
        <div>
            <img src='imagenes/cinema.jpg' alt=''>
            <input type="submit" value="comprar">
        </div>
        <div>
            <img src='imagenes/dune.webp' alt=''>
            <input type="submit" value="comprar">
        </div>
        <div>
            <img src='imagenes/et.webp' alt=''>
            <input type="submit" value="comprar">
        </div>
        <div>
            <img src='imagenes/space.jpg' alt=''>
            <input type="submit" value="comprar">
        </div>
    </form>
</body>
</html>