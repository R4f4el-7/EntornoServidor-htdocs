<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <?php
        $idioma = "english";
        // Cargar archivo de idioma
        include "Vista/$idioma.php";
    ?>
    
    <!-- HEADER -->
    <header>
        <?php include 'Vista/perfil.php'; ?>
    </header>

    <!-- MENÚ -->
    <nav id="menu">
        <?php include 'Vista/menu.php'; ?>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main>
        <section class="contenedor">
            <p><?php include 'Vista/contenido.php'; ?></p>
        </section>
    </main>

    <!-- PIE DE PÁGINA -->
    <footer>
        <?php include 'Vista/pie.php'; ?>
    </footer>

</body>
</html>