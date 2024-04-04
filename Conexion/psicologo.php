<?php
session_start();
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #ecf0f1;
    }

    header {
        background-color: #3498db;
        padding: 10px;
        color: white;
        text-align: center;
    }

    .profile {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .profile h2 {
        color: #3498db;
    }

    .profile-info {
        display: flex;
        align-items: center;
    }

    .profile-picture {
        margin-right: 20px;
    }

    .profile-picture img {
        width: 100px;
        border-radius: 50%;
    }

    .profile-details {
        flex-grow: 1;
    }

    .edit-profile-btn {
        background-color: #3498db;
        color: white;
        padding: 10px;
        cursor: pointer;
        border: none;
        width: 100%;
        margin-bottom: 15px;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .edit-profile-btn:hover {
        background-color: #2980b9;
        transform: scale(1.05);
    }

    .edit-profile-btn:active {
        transform: scale(0.95);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .edit-profile-btn {
        animation: fadeIn 0.5s ease-out;
    }

    footer {
        background-color: #3498db;
        padding: 10px;
        color: white;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="psicologo.css">
    <title>Perfil de Psicólogo</title>
    <script>
        // Función para redirigir al usuario al hacer clic en el botón "Editar Perfil"
        function redirectToEditProfile() {
            window.location.href = "editar_perfil_psicologo.php";
        }

        // Función para redirigir al usuario al hacer clic en el botón "Cerrar Sesión"
        function redirectToLogin() {
            window.location.href = "login.php";
        }

        // Función para redirigir al usuario al hacer clic en el botón "Ver Citas"
        function redirectToCitas() {
            window.location.href = "citas_pendientes.php";
        }
    </script>
</head>
<body>
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
                <?php
                // Verificar si existe una sesión y datos de usuario
                if (isset($_SESSION['usuario'])) {
                    $usuario = $_SESSION['usuario'];
                    echo "<p><strong>Nombre:</strong> {$usuario['Nombre']}</p>";
                    if (isset($usuario['Titulo_Academico'])) {
                        echo "<p><strong>Título Académico:</strong> {$usuario['Titulo_Academico']}</p>";
                    } else {
                        echo "<p><strong>Título Académico:</strong> No disponible</p>";
                    }
                    if (isset($usuario['Cedula_Profesional'])) {
                        echo "<p><strong>Cedula Profesional:</strong> {$usuario['Cedula_Profesional']}</p>";
                    } else {
                        echo "<p><strong>Cedula Profesional:</strong> No disponible</p>";
                    }
                    if (isset($usuario['Experiencia_Laboral'])) {
                        echo "<p><strong>Experiencia Laboral:</strong> {$usuario['Experiencia_Laboral']}</p>";
                    } else {
                        echo "<p><strong>Experiencia Laboral:</strong> No disponible</p>";
                    }
                    if (isset($usuario['Areas_Especializacion'])) {
                        echo "<p><strong>Areas Especializacion:</strong> {$usuario['Areas_Especializacion']}</p>";
                    } else {
                        echo "<p><strong>Areas Especializacion:</strong> No disponible</p>";
                    }
                    if (isset($usuario['Certificados_Adicionales'])) {
                        echo "<p><strong>Certificados Adicionales:</strong> {$usuario['Certificados_Adicionales']}</p>";
                    } else {
                        echo "<p><strong>Certificados Adicionales:</strong> No disponible</p>";
                    }
                    // Agregar más información de sesiones aquí
                }
                ?>
            </div>
        </div>
        <button class="edit-profile-btn" onclick="redirectToEditProfile()">Editar Perfil</button>
        <button class="edit-profile-btn" onclick="redirectToLogin()">Cerrar Sesión</button>
        <button class="edit-profile-btn" onclick="redirectToCitas()">Ver Citas</button>
    </section>
    <footer>
        <p>&copy; 2023 Mi Sitio Web</p>
    </footer>
</body>
</html>
