<?php
session_start(); // Inicia la sesión, asegúrate de que la autenticación se haya realizado antes

// Verifica si el usuario está autenticado, si no, redirige al inicio de sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['guardar'])) {
    // Recupera los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];

    // Actualiza los datos del usuario en la base de datos
    // Conecta a la base de datos y actualiza los campos relevantes en la tabla de usuarios
    $conexion = new mysqli('tu_servidor', 'tu_usuario', 'tu_contraseña', 'tu_base_de_datos');
    if ($conexion->connect_error) {
        die('Error en la conexión a la base de datos: ' . $conexion->connect_error);
    }

    $user_id = $_SESSION['user_id'];
    $query = "UPDATE usuarios SET nombre = '$nombre', edad = '$edad', fecha_nacimiento = '$fecha_nacimiento', telefono = '$telefono' WHERE id = $user_id";

    if ($conexion->query($query) === TRUE) {
        // Los datos se actualizaron con éxito
        header('Location: perfil_usuario.php');
        exit;
    } else {
        // Error en la actualización
        echo "Error: " . $conexion->error;
    }

    $conexion->close();
}
?>