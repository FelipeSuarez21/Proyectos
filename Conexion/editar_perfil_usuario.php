<?php
session_start();

// Supongamos que $usuario es un arreglo con los datos del usuario.
$usuario = [
    'Nombre' => ' ',
    'Edad' => ' ',
    'Fecha_Nacimiento' => ' ',
    'Telefono' => ' ',
    // ... otros datos del usuario
];

// Verificar si se enviaron datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevoNombre = $_POST['nombre'];
    $nuevaEdad = $_POST['edad'];
    $nuevaFechaNacimiento = $_POST['fecha_nacimiento'];
    $nuevoTelefono = $_POST['telefono'];
    $nuevaContrasena = $_POST['contrasena'];

    // Por simplicidad, solo actualizamos los datos en el arreglo $usuario.
    $usuario['Nombre'] = $nuevoNombre;
    $usuario['Edad'] = $nuevaEdad;
    $usuario['Fecha_Nacimiento'] = $nuevaFechaNacimiento;
    $usuario['Telefono'] = $nuevoTelefono;

    // Actualizar la contraseña solo si se proporciona una nueva.
    if (!empty($nuevaContrasena)) {
        // Hashear la nueva contraseña antes de almacenarla
        $hashContrasena = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
        $usuario['Contraseña'] = $hashContrasena;
    }

    // Procesar el formulario y realizar otras acciones necesarias

    // Actualizar la sesión con los nuevos datos
    $_SESSION['usuario'] = $usuario;

    // Redirigir a perfil_usuario.php después de guardar los cambios
    header("Location: perfil_usuario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="usuario.css">
    <title>Editar Perfil de Usuario</title>
    <style>
    /* Otros estilos aquí */

    /* Estilo adicional para el formulario */
    .edit-profile form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Estilo para los campos de texto */
    .edit-profile input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    /* Estilo para el botón */
    .edit-profile button {
        background-color: #3498db;
        color: white;
        padding: 10px;
        cursor: pointer;
        border: none;
        width: 100%;
    }

    .edit-profile button:hover {
        background-color: #2980b9;
    }

    .edit-profile form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    
    .edit-profile input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

        
    .edit-profile button {
        background-color: #3498db;
        color: white;
        padding: 10px;
        cursor: pointer;
        border: none;
        width: 100%;
        margin-bottom: 10px;
    }

    .edit-profile button:hover {
        background-color: #2980b9;
    }
</style>
</head>
<body>
    <header>
        <h1>Editar Perfil</h1>
    </header>
    <section class="edit-profile">
        <form action="editar_perfil_usuario.php" method="post">
            <p><strong>Nombre:</strong> <input type="text" name="nombre" value="<?php echo isset($_SESSION['usuario']['Nombre']) ? $_SESSION['usuario']['Nombre'] : ''; ?>" placeholder="Ingresa tu nombre"></p>
            <p><strong>Edad:</strong> <input type="text" name="edad" value="<?php echo isset($_SESSION['usuario']['Edad']) ? $_SESSION['usuario']['Edad'] : ''; ?>" placeholder="Ingresa tu edad"></p>
            <p><strong>Fecha de Nacimiento:</strong> <input type="date" name="fecha_nacimiento" value="<?php echo isset($_SESSION['usuario']['Fecha_Nacimiento']) ? $_SESSION['usuario']['Fecha_Nacimiento'] : ''; ?>" placeholder="Ingresa tu fecha de nacimiento"></p>
            <p><strong>Número de Teléfono:</strong> <input type="text" name="telefono" value="<?php echo isset($_SESSION['usuario']['Telefono']) ? $_SESSION['usuario']['Telefono'] : ''; ?>" placeholder="Ingresa tu número de teléfono"></p>
            <p><strong>Contraseña:</strong> <input type="password" name="contrasena" placeholder="Ingresa tu contraseña"></p>
            <button type="submit" name="guardar">Guardar Cambios</button>
            <button type="button" onclick="window.location.href='perfil_usuario.php'">Regresar</button>
        </form>
    </section>
    <footer>
        <p>&copy; 2023 Mi Sitio Web</p>
    </footer>
</body>
</html>
    
