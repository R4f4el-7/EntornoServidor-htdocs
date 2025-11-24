<?php
session_start();
require "conexion.php";
    $nombre_pelicula = $_SESSION["nombre"];
    $sillas_disponibles = $_SESSION["disponible"];
    $sillas_reservadas = $_SESSION["reservar"];

    //Validar que sea un número entero positivo
    if(!is_numeric($sillas_disponibles) || $sillas_disponibles <= 0){
        die("sillas disponibles inválido");
    }
    if(!is_numeric($sillas_reservadas) || $sillas_reservadas <= 0){
        die("sillas reservadas inválido");
    }
    if($sillas_disponibles < $sillas_reservadas){
        die("No puede haber más sillas reservadas que disponibles(overbooking)");
    }
    
// --- Manejo del menú ---
/*?? '' significa que si no se envió nada por POST, 
la variable se inicializa como cadena vacía(false) para evitar errores.*/
$opcion = $_POST['opcion'] ?? '';
$accion = $_POST['accion'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Reserva</h2>
    <!-- Elegir actualizar reserva y mostrar -->
    <?php if(!$opcion): ?>
    <h4>1. Actualizar</h4>
    <h4>2. Mostrar</h4>
    <h4>3. Insertar los datos</h4>

    <form method="post">
        <label>Elige opción (1-3):</label>
        <input type="text" name="opcion">
        <input type="submit" value="Aceptar">
    </form>
    <a href="logout.php">Salir de sesion</a>
    <?php endif; ?>

    <?php if($opcion == 1)://Actualizar ?>
        <h2>Actualizar sillas</h2>
        <?php
        if($accion == 'actualizar'){
            $id = $_POST['id'];
            $disponible = $_POST['disponible'];

            //Validar que ID sea un número entero positivo
            if(!is_numeric($id) || $id <= 0){
                echo "<p>ID inválido</p>";
            } else {
                try {
                    $stmt = $conexion->prepare("UPDATE $table_peli SET sillas_total=? WHERE id=?");
                    $stmt->execute([$disponible, $id]);

                    //Número de registros afectados
                    if($stmt->rowCount() > 0){
                        echo "Se han actualizado " . $stmt->rowCount() . " registros";
                    } else {
                        echo "No se encontró ninguna persona con ese ID o no hubo cambios";
                    }
                } catch(PDOException $e){
                    echo "Error al actualizar: ".$e->getMessage();
                }
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="opcion" value="1">
            <input type="hidden" name="accion" value="actualizar">

            Id:<br><input type="text" name="id"><br>
            Sillas disponibles(actualizadas):<br><input type="text" name="disponible"><br>
            
            <input type="submit" value="Actualizar">
        </form>
        <a href="reservar.php">Volver al menú</a>
    <?php endif; ?>
    <?php if($opcion == 2): // Consultar ?>
        <h2>Consultar Persona</h2>
        <?php
        //Mostrar todas las personasx
        if($accion == 'todos'){
            try {
                $stmt = $conexion->query("SELECT id, nombre, sillas_total, sillas_reservadas FROM $table_peli");
                $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($personas) > 0){
                    echo "<h3>Lista de todas las personas</h3>";
                    echo "<table border='1' cellpadding='5'>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>sillas_total</th>
                                <th>sillas_reservadas</th>
                            </tr>";

                    foreach($personas as $p){
                        echo "<tr>
                                <td>{$p['id']}</td>
                                <td>{$p['nombre']}</td>
                                <td>{$p['sillas_total']}</td>
                                <td>{$p['sillas_reservadas']}</td>
                            </tr>";
                    }

                    echo "</table>";

                } else {
                    echo "<p>No hay registros</p>";
                }

            } catch(PDOException $e){
                echo "Error al consultar todos: ".$e->getMessage();
            }
        }
        ?>
         <!-- BOTÓN MOSTRAR TODOS -->
        <form method="post" style="margin-top:10px;">
            <input type="hidden" name="opcion" value="2">
            <input type="hidden" name="accion" value="todos">
            <input type="submit" value="Mostrar todos">
        </form>

        <a href="reservar.php">Volver al menú</a>
    <?php endif; ?>

    <?php if($opcion == 3)://Insertar ?>
        <h2>Insertar</h2>
        <?php
        if($accion == 'insertar'){
            //insertar los datos primero en la tabla pelicula
            try {
                $sql = "INSERT INTO $table_peli (nombre, sillas_total, sillas_reservadas) VALUES (?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->execute([$nombre_pelicula,$sillas_disponibles,$sillas_reservadas]);

                echo "Datos insertados correctamente que pusiste en cine.php";
            } catch (PDOException $e) {
                die("No se puede insertar datos: " . $e->getMessage());
            }
            //insertar los datos  en la tabla reserva
            /*
            try {
                $sql = "INSERT INTO $table_reserva (id, usuario_id, pelicula_id, sillas_reservadas) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->execute([$nombre_pelicula,$sillas_disponibles,$sillas_reservadas]);

                echo "Datos insertados correctamente que pusiste en cine.php";
            } catch (PDOException $e) {
                die("No se puede insertar datos: " . $e->getMessage());
            }*/
        }
        ?>
        <form method="post">
            <input type="hidden" name="opcion" value="3"><!--La página sigue sabiendo que estamos en opción 1-->
            <input type="hidden" name="accion" value="insertar"><!-- La acción sea 'insertar', lo que activa la lógica de inserción -->
            <input type="submit" value="Insertar">
        </form>
        <a href="reservar.php">Volver al menú</a>
    <?php endif; ?>
</body>
</html>