<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "proyecto_biblioteca";
//Se conecta solo al servidor MySQL (mysql:host=$server), sin usar dbname. Esto evita el error si la base aún no existe.
try {
    $conexion = new PDO("mysql:host=$server;charset=utf8", $user, $password);
    //Esto configura el modo de manejo de errores de PDO para que lance excepciones (PDOException) cuando algo sale mal.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/*setAttribute sirve para configurar un atributo interno del objeto PDO.*/

    echo "Conexión exitosa <br>";
} catch (PDOException $e) {
    die("Conexion fallida: " . $e->getMessage());
}
//Crear base de datos si no existe
try {
    $sqlDB = "CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conexion->exec($sqlDB);
    echo "Base de datos '$db' creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la base de datos: " . $e->getMessage());
}

//Conectarse ahora sí a la base de datos. 
try {
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión a la base '$db' exitosa<br>";
} catch (PDOException $e) {
    die("No se puede conectar a la base '$db': " . $e->getMessage());
}
//Creacion de tablas
//Tabla usuario
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(100),
        apellido1 VARCHAR(100),
        apellido2 VARCHAR(100),
        telefono VARCHAR(100),
        correo VARCHAR(100),
        contrasenia VARCHAR(100)
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//Insertar el admin
try {
    $sqlAdmin = "SELECT * FROM usuarios WHERE nombre = 'admin' LIMIT 1";
    $stmt = $conexion->query($sqlAdmin);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$admin) {
        $passwordHash = password_hash("1234", PASSWORD_DEFAULT);
        $sqlInsert = "INSERT INTO usuarios (nombre, correo, contrasenia) VALUES ('admin', 'admin@admin.com', :pass)";
        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->bindParam(":pass", $passwordHash);
        $stmtInsert->execute();
    }
} catch(PDOException $e) {
    die("Error creando admin: " . $e->getMessage());
}

//Tabla libros
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS libros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255),
        autor VARCHAR(255),
        editorial VARCHAR(255),
        anio_publicacion VARCHAR(10),
        isbn VARCHAR(20),
        descripcion TEXT,
        imagen VARCHAR(255)
    );";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//Tabla prestamo
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS prestamos (
        prestamo_id INT PRIMARY KEY AUTO_INCREMENT,
        usuario_id INT NOT NULL,
        fecha_prestamo DATE,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//Tabla detalles_prestamo
try {
    $sqlTable = "CREATE TABLE IF NOT EXISTS detalles_prestamo  (
        detalle_id INT AUTO_INCREMENT PRIMARY KEY,
        prestamo_id INT NOT NULL,
        libro_id INT NOT NULL,
        cantidad_prestada INT NOT NULL,
        fecha_devolucion DATE,
        FOREIGN KEY (prestamo_id) REFERENCES prestamos(prestamo_id),
        FOREIGN KEY (libro_id) REFERENCES libros(id)
    )";

    $conexion->exec($sqlTable);
    echo "Tabla creada correctamente <br>";
} catch (PDOException $e) {
    die("No se puede crear la tabla: " . $e->getMessage());
}
//api googles books
try {
    // Verificar si la tabla libros está vacía
    $stmt = $conexion->query("SELECT COUNT(*) FROM libros");
    $totalLibros = $stmt->fetchColumn();

    if ($totalLibros == 0) {

        // Lista de libros conocidos
        $librosConocidos = [
            "Harry Potter y la piedra filosofal",
            "El señor de los anillos",
            "1984 George Orwell",
            "El corredor del laberinto",
            "Los juegos del hambre",
            "Juego de tronos cancion",
            "Don Quijote de la Mancha",
            "El gran Gatsby",
            "La ladrona de libros"
        ];

        $insertStmt = $conexion->prepare(
            "INSERT INTO libros 
            (titulo, autor, editorial, anio_publicacion, isbn, descripcion, imagen)
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        foreach ($librosConocidos as $libro) {

            $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($libro) . "&maxResults=1";
            $response = file_get_contents($url);

            if ($response !== false) {

                $data = json_decode($response, true);

                if (isset($data['items'][0]['volumeInfo'])) {
                    $info = $data['items'][0]['volumeInfo'];

                    // Verificar que tenga todos los campos esenciales
                    if (!empty($info['title']) && !empty($info['authors'][0]) &&
                        !empty($info['publisher']) && !empty($info['publishedDate']) &&
                        !empty($info['description']) && !empty($info['imageLinks']['thumbnail']) &&
                        !empty($info['industryIdentifiers'])) {

                        // Obtener ISBN_13
                        $isbn = null;
                        foreach ($info['industryIdentifiers'] as $id) {
                            if ($id['type'] === 'ISBN_13') {
                                $isbn = $id['identifier'];
                                break;
                            }
                        }

                        // Insertar solo si tiene ISBN
                        if ($isbn) {
                            $insertStmt->execute([
                                $info['title'],
                                $info['authors'][0],
                                $info['publisher'],
                                $info['publishedDate'],
                                $isbn,
                                $info['description'],
                                $info['imageLinks']['thumbnail']
                            ]);
                        }
                    }
                }
            }
        }

        echo "Libros conocidos importados automáticamente<br>";
    }
} catch (PDOException $e) {
    echo "Error importando libros: " . $e->getMessage();
}
?>
