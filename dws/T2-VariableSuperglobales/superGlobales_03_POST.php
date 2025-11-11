<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="superGlobales_03_GET.php" method="POST">
        Usuario:<br>
        <input type="text" name="usuario"><br>
        Password:<br>
        <input type="text" name="password"><br>

        <input type="submit" value="login" name="login">
    </form>
</body>
</html>
<?php
    //mas seguro
    echo $_POST["usuario"]."<br>";
    echo $_POST["password"]."<br>";
