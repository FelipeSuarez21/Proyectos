<?php
include("./Credenciales.php");

session_start();

if (isset($_POST['accion'])) {
    if ($_POST['accion'] === 'Login') {
        $username = $_POST['username'];
        $contraseña = $_POST['contraseña'];

        // Consulta para verificar las credenciales de cliente
        $query = "SELECT * FROM Registro_Usuario WHERE Nombre=?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Consulta para verificar las credenciales de psicólogo
        $queryPsicologo = "SELECT * FROM Registro_Psicologo WHERE Nombre=?";
        $stmtPsicologo = $conexion->prepare($queryPsicologo);
        $stmtPsicologo->bind_param("s", $username);
        $stmtPsicologo->execute();
        $resPsicologo = $stmtPsicologo->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            // Verifica la contraseña usando password_verify
            if (password_verify($contraseña, $usuario['Contraseña'])) {
                $_SESSION['logueado'] = true;
                $_SESSION['usuario'] = $usuario;

                $tipo_usuario = $usuario['Tipo'];

                if ($tipo_usuario === 'cliente') {
                    header("Location: perfil_usuario.php");
                    exit();
                }
            }
        } elseif ($resPsicologo->num_rows > 0) {
            $psicologo = $resPsicologo->fetch_assoc();

            // Verifica la contraseña usando password_verify
            if (password_verify($contraseña, $psicologo['Contraseña'])) {
                $_SESSION['logueado'] = true;
                $_SESSION['usuario'] = $psicologo;

                $tipo_psicologo = $psicologo['Tipo'];

                if ($tipo_psicologo === 'psicologo') {
                    header("Location: psicologo.php");
                    exit();
                }
            }
        }

        echo "Error de autenticación";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="img/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="contraseña" placeholder="Password" required>
                <i class='bx bx-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label for="remember"><input type="checkbox" id="remember"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn" name="accion" value="Login">Login</button>

            <div class="register-link">
                <p>Forgot password? <a href="perfiles.php">Register</a></p>
            </div>
            <div class="user-type">
            </div>
        </form>
    </div>
</body>
</html>
