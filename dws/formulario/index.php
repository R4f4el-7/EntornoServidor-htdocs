<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { font-family: Arial; background-color: #f3f3f3; margin: 40px; }
        form { background: white; padding: 20px; border-radius: 10px; width: 400px; }
        input, textarea, select { width: 100%; margin-bottom: 10px; padding: 8px; }
        input[type="submit"] { background: #007bff; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Formulario</h2>

    <form action="datos.php" method="post" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" require>

        <label>Apellido:</label>
        <input type="text" name="apellido">

        <input type="file" name="archivo">
        <input type="submit" value="Guardar y mostrar">
    </form>
</body>
</html>