<?php
session_start();

echo $_SESSION["usuario"] . "<br>";
echo $_SESSION["password"] . "<br>";

if(isset($_POST["logout"])){
    session_destroy();
    setcookie("cookie1", "", time() - 3600, "/");
    header("Location: biblioteca.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Logout</h2>
    <form method="post">
        <input type="submit" name="logout" value="Salir">
    </form>
</body>
</html>

<?php
    
?>