<?php
session_start(); // Inicia la sesión

// if (isset($_SESSION['logueado']) && $_SESSION['logueado']) {
    // Usuario logueado, muestra contenido de perfiles
   // echo "¡Bienvenido, " . $_SESSION['usuario'] . "!";
//} else {
    
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="usuario.css">
    <title>Perfil de Usuario</title>

    <!-- Estilos de la barra de navegación -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: #3498db; /* Color azul para la barra de navegación */
            padding: 15px;
            color: #fff; /* Color de texto blanco */
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 50px; /* Ajusta el tamaño del logo según tus necesidades */
        }

        .app-name {
            flex-grow: 1; /* Hace que el nombre de la aplicación ocupe el espacio restante */
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            padding: 15px;
            display: inline-block;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #3498db;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0; /* Ajusta esta propiedad para evitar que el menú desplegable se salga de la pantalla */
        }

        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px; /* Ajusta el tamaño de la letra según tus preferencias */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<!-- Barra de navegación -->
<nav>
    <img src="tu_logo.png" alt="Logo de Mindmatch" class="logo">
    <div class="app-name">Mindmatch</div>
    <div class="nav-links">
        <a href="Perfil_Usuario.php">Inicio</a>
        <a href="#">Catálogo</a>
        <div class="dropdown">
            <a href="#">Más</a>
            <div class="dropdown-content">
            <a href="#">Inicio</a>
                <a href="#">Acerca de</a>
                <a href="#">Cerrar sesión</a>
            </div>
        </div>
    </div>
</nav>

<!-- Contenido del perfil de usuario -->
<header>
    <h1>Mi Perfil</h1>
</header>
<section class="profile">
    <h2>Información del Perfil</h2>
    <div class="profile-info">
        <div class="profile-picture">
            <img src="profile.jpg" alt="Foto de perfil">
        </div>
        <div class="profile-details">
            <form action="procesar_perfil.php" method="post">
                <!-- Asegúrate de incluir el valor actual del usuario en los campos del formulario -->
                <p><strong>Nombre:</strong> <input type="text" name="nombre" value="<?php echo $usuario['Nombre'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                <p><strong>Edad:</strong> <input type="text" name="edad" value="<?php echo $usuario['Edad'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                <p><strong>Fecha de Nacimiento:</strong> <input type="text" name="fecha_nacimiento" value="<?php echo $usuario['Fecha_Nacimiento'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                <p><strong>Correo Electrónico:</strong> <?php echo $usuario['Correo_Electronico'] ?? ''; ?></p>
                <p><strong>Número de Teléfono:</strong> <input type="text" name="telefono" value="<?php echo $usuario['Telefono'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                <p><strong>Contraseña:</strong> ********</p>
                <button type="submit" name="guardar" <?php echo $editar_perfil ? '' : 'disabled'; ?>>Guardar Cambios</button>
            </form>
        </div>
    </div>
    <h2>Información de Sesiones con el Psicólogo</h2>
    <div class="session-info">
        <p><strong>Fecha de Sesión:</strong> 15/03/2023</p>
        <p><strong>Costo:</strong> $50</p>
        <!-- Agregar más información de sesiones aquí -->
    </div>
    <button id="edit-profile">Editar Perfil</button>

    <script>
        document.getElementById('edit-profile').addEventListener('click', function() {
            // Al presionar el botón de "Editar Perfil", redirige a la página de edición
            window.location.href = 'editar_perfil_usuario.php';
        });
    </script>
</section>
<footer>
    <p>&copy; 2023 Mi Sitio Web</p>
</footer>

</body>
</html>
