<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumno</title>
    <style>
        body { font-family: Arial; background-color: #f3f3f3; margin: 40px; }
        form { background: white; padding: 20px; border-radius: 10px; width: 400px; }
        input, textarea, select { width: 100%; margin-bottom: 10px; padding: 8px; }
        input[type="submit"] { background: #007bff; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Formulario del Alumno</h2>

    <form action="procesar.php" method="POST" enctype="multipart/form-data">
        <label>Nombre completo:</label>
        <input type="text" name="nombre" required>

        <label>Dirección:</label>
        <input type="text" name="direccion">

        <label>Teléfono:</label>
        <input type="text" name="telefono">

        <label>Primera experiencia:</label>
        <input type="text" name="exp1">

        <label>Segunda experiencia:</label>
        <input type="text" name="exp2">

        <label>Habilidades:</label><br>
        <input type="radio" name="habilidades" value="Software" required> Software<br>
        <input type="radio" name="habilidades" value="Hardware"> Hardware<br><br>

        <label>Subir archivo (.txt):</label>
        <input type="file" name="archivo" accept=".txt">

        <input type="submit" value="Guardar y Mostrar Datos">
    </form>
</body>
</html>