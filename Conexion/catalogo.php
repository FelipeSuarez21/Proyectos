<?php 
include('Credenciales.php');
$sql='SELECT *
FROM Registro_Psicologo rp
LEFT JOIN DatosProfesionales dp ON rp.Id_Psi = dp.IdPsicologo';
$result=$conexion->query($sql); 


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="catalogo.css">
    <title>Catálogo de Psicólogos</title>
</head>
<body>
    <header>
        <h1>Catálogo de Psicólogos</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="Contacto.php">Contacto</a></li>
                <li><a href="perfiles.php">Registro</a></li>
            </ul>
        </nav>
    </header>
    <main>

    <?php foreach($result as $psi): ?>
        <section class="psicologo" data-toggle="psicologo1">
            <div class="psicologo-img-container">
            </div>
            <div class="psicologo-info">
                <h2><?php echo $psi['Nombre'] ?></h2>
                <p>Experiencia: <?php echo $psi['Experiencia_Laboral'] ?></p>
                <p>Especialización: <?php echo $psi['Areas_Especializacion'] ?></p>
                <div class="psicologo-more">
                    <p>Correo electronico: <?php echo $psi['Correo_Electronico'] ?></p>
                </div>
                <a href="#">Ver más</a>
            </div>
        </section>
        <!-- Agrega más psicólogos según sea necesario -->
<?php endforeach; ?>
    </main>
    <script src="catalogo.js"></script>
</body>
</html>
