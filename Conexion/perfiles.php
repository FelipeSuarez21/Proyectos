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
    <link rel="stylesheet" href="perfiles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Registro de Usuarios</title>
</head>
<body>
    <div class="container">
        <h1>Registro de Usuarios</h1>

        <!-- Formulario para Cliente -->
        <form action="./registrar_usuarios.php" method="post">
            <div class="form-group">
                <label for="cliente">Registro de Cliente</label>
                <input type="text" id="cliente" name="cliente_name" placeholder="Nombre" required>
                <input type="password" name="cliente_password" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <label for="cliente_email">Correo Electrónico</label>
                <input type="text" id="cliente_email" name="cliente_email" placeholder="Correo Electrónico" required>
            </div>
            <button type="submit" class="btn" name="accion" value="cliente_registro">Registrar Cliente</button>
        </form>

        <!-- Formulario para Psicólogo -->
        <form action="registrar_usuarios.php" method="post">
            <div class="form-group">
                <label for="psicologo">Registro de Psicólogo</label>
                <input type="text" id="psicologo" name="psicologo_name" placeholder="Nombre" required>
                <input type="password" name="psicologo_password" placeholder="Contraseña" required>
                <input type="text" id="psicologo_email" name="psicologo_email" placeholder="Correo Electrónico" required>
            </div>
            <button type="submit" class="btn" name="accion" value="psicologo_registro">Registrar Psicólogo</button>
        </form>

        <!-- Agrega un botón para iniciar sesión -->
        <div class="user-type">
            ¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a>
        </div>
    </div>
</body>
</html>
