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

        <label>Correo electronico:</label>
        <input type="text" name="email">

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="clave" minlength="6" required>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha">

        <label>Genero:</label><br>
        <input type="radio" name="genero" value="hombre" required> hombre<br>
        <input type="radio" name="genero" value="mujer"> mujer<br><br>

        Menú desplegable.
      <label for="pais">País:</label>
      <select id="pais" name="pais" required>
        <option value="">Selecciona tu país</option>
        <option value="ar">Argentina</option>
        <option value="co">Colombia</option>
       <option value="es">España</option>
        <option value="fr">Francia</option>
        <option value="en">Inglaterra</option> 
      </select>

      <label for="bio">Biografía:</label>
      <textarea id="bio" name="biografia" rows="4" placeholder="Cuéntanos algo sobre ti..."></textarea>


        <label>Subir archivo (.txt):</label>
        <input type="file" name="archivo" accept=".txt">

        <input type="submit" value="Guardar y Mostrar Datos">
    </form>
</body>
</html>