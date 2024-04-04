<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
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

        nav {
            background-color: #3498db;
            display: flex;
            justify-content: center; /* Centrar los botones horizontalmente */
            align-items: center;
            padding: 15px 20px; /* Aumentado el espacio vertical */
        }

        .nav-links {
            display: flex;
            gap: 30px; /* Aumentado el espacio entre botones */
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 18px; /* Aumentado el tamaño de fuente */
            padding: 10px; /* Espaciado interno de los botones */
            position: relative;
        }

        .nav-links a::before {
            content: 'MindMatch';
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .nav-links a:hover::before {
            opacity: 1;
        }

        .about {
            max-width: 400px; /* Reducir el ancho del contenedor */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-out forwards, scaleIn 0.3s ease-out forwards; /* Añadida otra animación de escala */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.8); /* Escala inicial más pequeña */
            }
            to {
                transform: scale(1);
            }
        }

        h2 {
            color: #3498db;
            margin-bottom: 15px;
        }

        p {
            color: #555;
            margin-bottom: 20px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 15px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            width: 100%;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
    </style>
    <title>MindMatch</title>
</head>
<body>
    <header>
        <h1>MindMatch</h1>
    </header>
    <nav>
        <div class="nav-links">
            <a href="index.php">Inicio</a>
            <a href="login.php">Login</a>
            <a href="nosotros.php">Nosotros</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="perfiles.php">Registro</a>
        </div>
    </nav>

    <!-- Contenido del archivo "nosotros.php" -->
    <section class="about">
        <h2>Nuestra Empresa</h2>
        <p>Somos una empresa dedicada a proporcionar soluciones profesionales para nuestros clientes.</p>
        
        <!-- Botones para los currículums de los desarrolladores -->
        <button onclick="window.location.href='curriculum/cccmD.php'">Dámaso Felipe Suárez Ruelas</button>
        <button onclick="window.location.href='curriculum/cccmE.php'">Emmanuel Gallegos Hernandez</button>
        <button onclick="window.location.href='curriculum/cccmi.php'">Esdras Isaac Malfitano Barron</button>
        <button onclick="window.location.href='curriculum/cccmJ.php'">Jesus Eduardo Ramirez Vazquez</button>
        
        <!-- Botón para regresar a la página del catálogo -->
        <button onclick="window.location.href='catalogo.php'">Regresar</button>
    </section>
</body>
</html>
