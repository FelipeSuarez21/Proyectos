<?php
include("./Credenciales.php");

session_start();

if (isset($_POST['accion'])) {
    $nombre = $_POST['cliente_name'] ?? $_POST['psicologo_name'] ?? '';
    $contraseña = $_POST['cliente_password'] ?? $_POST['psicologo_password'] ?? '';
    $correo_electronico = $_POST['cliente_email'] ?? $_POST['psicologo_email'] ?? '';
    $tipo_usuario = '';

    if ($_POST['accion'] === 'cliente_registro') {
        $tipo_usuario = 'cliente';
        $tabla = 'Registro_Usuario';
    } elseif ($_POST['accion'] === 'psicologo_registro') {
        $tipo_usuario = 'psicologo';
        $tabla = 'Registro_Psicologo';
    } else {
        echo "Acción no válida";
        exit();
    }

    // Hash de la contraseña
    $contraseña_hashed = password_hash($contraseña, PASSWORD_DEFAULT);

    // Consulta preparada para evitar inyección SQL
    $query = "INSERT INTO $tabla (Nombre, Contraseña, Correo_Electronico, Tipo) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssss", $nombre, $contraseña_hashed, $correo_electronico, $tipo_usuario);

    // Ejecutar la consulta
    $resultado = $stmt->execute();

    if ($resultado) {
        $_SESSION['registrado'] = true;
        $_SESSION['usuario'] = $nombre;
        header("Location: login.php");
        exit();
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }
}
?>
