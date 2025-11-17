<?php
// Si se ha pulsado un botón, guardar la cookie con el color
if (isset($_POST["color"])) {
    $color = $_POST["color"]; 
    setcookie("color-texto", $color, time() + 86400, "/"); // 1 día
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookie color</title>
</head>
<body>
    <!-- Botones para elegir color -->
    <form method="post">
        <button name="color" value="red">Rojo</button>
        <button name="color" value="blue">Azul</button>
        <button name="color" value="green">Verde</button>
        <button name="color" value="black">Ninguno</button>
    </form>
    <a href="texto_color.php">Ir a Texto con color</a>
</body>
</html>