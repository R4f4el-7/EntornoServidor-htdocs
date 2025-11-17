<?php
//Leer el color actual (si existe cookie)
$colorActual = isset($_COOKIE["color-texto"]) ? $_COOKIE["color-texto"] : "black";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style="color: <?= htmlspecialchars($colorActual) ?>;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eum qui iusto quibusdam ipsum debitis laborum provident nemo dolorum error, cumque, sunt saepe numquam et accusantium ut, magnam eveniet sed.</p>
    <a href="index.php">Volver al index</a>
</body>
</html>