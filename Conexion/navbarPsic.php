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
    <link rel="stylesheet" href="psicologo.css">
    <title>Perfil de Psicólogo</title>

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
        <a href="#">Inicio</a>
        <a href="#">Acerca</a>
        <div class="dropdown">
            <a href="#">Más</a>
            <div class="dropdown-content">
                <a href="#">Opción 1</a>
                <a href="#">Opción 2</a>
                <a href="#">Opción 3</a>
            </div>
        </div>
    </div>
</nav>

<!-- Contenido del perfil de psicólogo -->
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
            <!-- Accede directamente a la información del psicólogo almacenada en la sesión -->
            <p><strong>Nombre:</strong> <?php echo $usuario['Nombre']; ?></p>
            <p><strong>Título Académico:</strong> Licenciatura en Psicología</p>
            <p><strong>Cédula Profesional:</strong> 1234567890</p>
            <p><strong>Experiencia Laboral:</strong> 10 años</p>
            <p><strong>Áreas de Especialización:</strong> Psicología Clínica, Psicoterapia de Parejas</p>
            <p><strong>Certificados Adicionales:</strong> Terapia Cognitivo-Conductual, Terapia Familiar</p>
            <!-- Agregar más información de sesiones aquí -->
        </div>
    </div>
    <button id="edit-profile">Editar Perfil</button>
</section>
<footer>
    <p>&copy; 2023 Mi Sitio Web</p>
</footer>

</body>
</html>
