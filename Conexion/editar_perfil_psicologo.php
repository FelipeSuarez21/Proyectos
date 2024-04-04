<?php
include('Credenciales.php'); 
session_start();

// Supongamos que $usuario es un arreglo con los datos del usuario.
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : [
    'Nombre' => ' ',
    'Titulo_Academico' => ' ',
    'Cedula_Profesional' => ' ',
    'Experiencia_Laboral' => ' ',
    'Areas_Especializacion' => ' ',
    'Certificados_Adicionales' => ' ',
    // ... otros datos del usuario
];

// Verificar si se enviaron datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevoNombre = $_POST['nombre'];
    $nuevoTituloAcademico = $_POST['titulo_academico'];
    $nuevaCedulaProfesional = $_POST['cedula_profesional'];
    $nuevaExperienciaLaboral = $_POST['experiencia_laboral'];
    $nuevasAreasEspecializacion = $_POST['areas_especializacion'];
    $nuevosCertificadosAdicionales = $_POST['certificados_adicionales'];
    $nuevaContraseña = $_POST['contraseña'];
    $Session_user = $_SESSION['usuario'];
    $IdPsicologo = $Session_user['Id_Psi'];

    // Por simplicidad, solo actualizamos los datos en el arreglo $usuario.
    $usuario['Nombre'] = $nuevoNombre;
    $usuario['Titulo_Academico'] = $nuevoTituloAcademico;
    $usuario['Cedula_Profesional'] = $nuevaCedulaProfesional;
    $usuario['Experiencia_Laboral'] = $nuevaExperienciaLaboral;
    $usuario['Areas_Especializacion'] = $nuevasAreasEspecializacion;
    $usuario['Certificados_Adicionales'] = $nuevosCertificadosAdicionales;

   // $query = "INSERT INTO DatosProfesionales (Titulo_Academico,Cedula_Profesional,Experiencia_Laboral,Areas_Especializacion,Certificaciones_Adicionales,IdPsicologo) VALUES (?,?,?,?,?,?)";
    $query = "INSERT INTO DatosProfesionales (Titulo_Academico,Cedula_Profesional,Experiencia_Laboral,Areas_Especializacion,Certificaciones_Adicionales,IdPsicologo) VALUES ('$nuevoTituloAcademico','$nuevaCedulaProfesional','$nuevaExperienciaLaboral','$nuevasAreasEspecializacion','$nuevosCertificadosAdicionales','$IdPsicologo')";
    $stmt = $conexion->query($query); 
    //$stmt = $conexion->prepare($query);
    //$stmt->bind_param($nuevoTituloAcademico,$nuevaCedulaProfesional,$nuevaExperienciaLaboral,$nuevasAreasEspecializacion,$nuevosCertificadosAdicionales,$IdPsicologo);    

    // Actualizar la contraseña solo si se proporciona una nueva.
    if (!empty($nuevaContraseña)) {
        // Hashear la nueva contraseña antes de almacenarla
        $hashContrasena = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
        $usuario['Contraseña'] = $hashContrasena;
        $query = "UPDATE Registro_Psicologo set Contraseña = '$hashContrasena' where Id_Psi='$IdPsicologo'"; 
        $stmt = $conexion->query($query);
   
    }

    // Procesar el formulario y realizar otras acciones necesarias

    $conexion->close(); 
    // Actualizar la sesión con los nuevos datos
    $_SESSION['usuario'] = $usuario;

    // Redirigir a psicologo.php después de guardar los cambios
    header("Location: psicologo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="usuario.css">
    <title>Editar Perfil de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .edit-profile form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .edit-profile input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .edit-profile textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            resize: vertical;
        }

        .edit-profile button {
            background-color: #3498db;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            width: 100%;
            margin-bottom: 15px;
            transition: background-color 0.3s ease-in-out;
        }

        .edit-profile button:hover {
            background-color: #2980b9;
        }

        .edit-profile button:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <header>
        <h1>Editar Perfil</h1>
    </header>
    <section class="edit-profile">
        <form action="editar_perfil_psicologo.php" method="post">
            <p><strong>Nombre:</strong> <input type="text" name="nombre" value="<?php echo isset($usuario['Nombre']) ? $usuario['Nombre'] : ''; ?>" placeholder="Ingresa tu nombre"></p>
            <p><strong>Título Académico:</strong> <input type="text" name="titulo_academico" value="<?php echo isset($usuario['Titulo_Academico']) ? $usuario['Titulo_Academico'] : ''; ?>" placeholder="Ingresa tu título académico"></p>
            <p><strong>Cédula Profesional:</strong> <input type="text" name="cedula_profesional" value="<?php echo isset($usuario['Cedula_Profesional']) ? $usuario['Cedula_Profesional'] : ''; ?>" placeholder="Ingresa tu cédula profesional"></p>
            <p><strong>Experiencia Laboral (años):</strong> <input type="number" name="experiencia_laboral" value="<?php echo isset($usuario['Experiencia_Laboral']) ? $usuario['Experiencia_Laboral'] : ''; ?>" placeholder="Ingresa tu experiencia laboral"></p>
            <p><strong>Áreas de Especialización:</strong> <input type="text" name="areas_especializacion" value="<?php echo isset($usuario['Areas_Especializacion']) ? $usuario['Areas_Especializacion'] : ''; ?>" placeholder="Ingresa tus áreas de especialización"></p>
            <p><strong>Certificados Adicionales:</strong> <textarea name="certificados_adicionales" rows="4" placeholder="Ingresa certificados adicionales"><?php echo isset($usuario['Certificados_Adicionales']) ? $usuario['Certificados_Adicionales'] : ''; ?></textarea></p>
            <p><strong>Contraseña:</strong> <input type="password" name="contraseña" id="contraseña" placeholder="Ingresa tu contraseña"></p>
            <button type="submit" name="guardar" id="guardar" disabled>Guardar Cambios</button>
            <button type="button" onclick="window.location.href='psicologo.php'">Regresar</button>

            <script>
                // Habilitar el botón al ingresar la contraseña
                document.getElementById('contraseña').addEventListener('input', function() {
                    document.getElementById('guardar').disabled = this.value.trim() === '';
                });
            </script>
        </form>
    </section>
    <footer>
        <p>&copy; 2023 Mi Sitio Web</p>
    </footer>
</body>
</html>
