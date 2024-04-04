<?php
include("./Credenciales.php");

// Inicia la sesión
session_start();

// Verifica si el usuario está logueado
if (!isset($_SESSION['logueado'])) {
    // Si no está logueado, redirige al login
    header("Location: login.php");
    exit();
}

// Obtener datos del usuario desde la sesión
$usuario = $_SESSION['usuario'] ?? [];

// Verifica si el perfil está en modo de edición
$editar_perfil = isset($_SESSION['editar_perfil']) && $_SESSION['editar_perfil'];

// Limpia la variable de sesión después de leerla
unset($_SESSION['editar_perfil']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usuario.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            padding: 10px;
            color: white;
        }

        nav {
            background-color: #3498db;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 60px;
        }

        .logo {
            width: 80px;
            height: auto;
        }

        .app-name {
            font-size: 20px;
            margin: 0;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            display: block;
            text-decoration: none;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .profile {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile h2 {
            color: #3498db;
        }

        .profile-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-details {
            flex: 1;
        }

        .profile-details form {
            display: flex;
            flex-direction: column;
        }

        .profile-details p {
            margin-bottom: 10px;
        }

        .profile-details input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .profile-details button {
            background-color: #3498db;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        .profile-details button:disabled {
            background-color: #95a5a6;
            cursor: not-allowed;
        }

        .session-info {
            margin-bottom: 20px;
        }

        .session-info p {
            margin-bottom: 10px;
        }

        #edit-profile {
            background-color: #3498db;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        #edit-profile:hover {
            background-color: #2980b9;
        }

        footer {
            background-color: #3498db;
            padding: 10px;
            color: white;
            text-align: center;
        }
    </style>
    <title>Perfil de Usuario</title>
</head>

<body>
    <header>
        <nav>
            <div class="center-logo">
                <img src="../img/mind.jpg" alt="Logo de Mindmatch" class="logo">
            </div>
            <div class="nav-links">
                <div class="dropdown">
                    <a href="#">Más</a>
                    <div class="dropdown-content">
                        <a href="Catalogo_Psicologos.php">Psicologos</a>
                        <a href="login.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </nav>
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
                    <p><strong>Nombre:</strong> <input type="text" name="nombre" value="<?php echo $usuario['Nombre'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                    <p><strong>Edad:</strong> <input type="text" name="edad" value="<?php echo $usuario['Edad'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                    <p><strong>Fecha de Nacimiento:</strong> <input type="text" name="fecha_nacimiento" value="<?php echo $usuario['Fecha_Nacimiento'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                    <p><strong>Correo Electrónico:</strong> <input type="text" name="correo" value="<?php echo $usuario['Correo_Electronico'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                    <p><strong>Número de Teléfono:</strong> <input type="text" name="telefono" value="<?php echo $usuario['Telefono'] ?? ''; ?>" <?php echo $editar_perfil ? '' : 'readonly'; ?>></p>
                </form>
            </div>
        </div>
        <h2>Próximas Sesiónes:</h2>
        <div class="session-info">
            <p><strong></strong> 
            <p><strong></strong>
            <!-- Agregar más información de sesiones aquí -->
        </div>
        <button id="edit-profile">Editar Perfil</button>

        <script>
            document.getElementById('edit-profile').addEventListener('click', function () {
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
