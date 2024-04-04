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
    <link rel="icon" href="img/favicon.ico">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ecf0f1;
        }

        header {
            background-color: #3498db;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #3498db;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        li {
            margin: 0 10px;
        }

        a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #2980b9;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .psicologo {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: transform 0.3s ease-in-out;
        }

        .psicologo:hover {
            transform: translateY(-5px);
        }

        .psicologo-img-container {
            overflow: hidden;
            border-radius: 8px;
        }

        .psicologo-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .psicologo-info {
            margin-top: 15px;
        }

        h2 {
            color: #3498db;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin: 5px 0;
        }

        .psicologo-more {
            display: none;
            margin-top: 10px;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        a.view-more-link,
        a.contact-button,
        a.return-button {
            color: #3498db;
            text-decoration: underline;
            cursor: pointer;
        }

        .psicologo.show-more .psicologo-more {
            display: block;
        }
    </style>
    <title>Catálogo de Psicólogos</title>
</head>
<body>
    <header>
        <h1>Catálogo de Psicólogos</h1>
    </header>
    <main>
    <?php foreach($result as $psi): ?>    
    <section class="psicologo" data-toggle="psicologo2">
            <div class="psicologo-info">
                <h2><?php echo $psi['Nombre'] ?></h2>
                <p>Experiencia:<?php echo $psi['Experiencia_Laboral'] ?></p>
                <p>Especialización:<?php echo $psi['Areas_Especializacion'] ?></p>
                <div class="psicologo-more">
                    <p>Correo Electronico: <?php echo $psi['Correo_Electronico'] ?></p>
                </div>
            <div class="action-buttons">
                <a href="#" class="view-more-link">Ver más</a>
                <a href="agendas.php" class="contact-button">Contactar</a>
                <a href="Perfil_Usuario.php" class="contact-button">Regresar</a>
            </div>
        </section>
    <?php endforeach ?>
        <!-- Agrega más psicólogos según sea necesario -->
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const psicologos = document.querySelectorAll('.psicologo');

            psicologos.forEach(psicologo => {
                psicologo.addEventListener('click', () => {
                    psicologo.classList.toggle('show-more');
                });
            });
        });
    </script>
</body>
</html>
