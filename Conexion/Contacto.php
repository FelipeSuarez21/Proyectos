<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            justify-content: space-between;
            align-items: center;
            padding: 0px 20px;
        }

        .logo {
            width: 80px;
            height: auto;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .contact {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-out forwards;
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

        h2 {
            color: #3498db;
            margin-bottom: 15px;
        }

        p {
            color: #555;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
            color: #555;
            display: flex;
            align-items: center;
        }

        li i {
            margin-right: 10px;
            font-size: 18px;
        }

        .fas {
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="img/favicon.ico">
    <title>Contacto</title>
</head>
<body>
    <header>
        <h1><img src="../img/mind.jpg" alt="Logo de Mindmatch" class="logo"></h1>
    </header>
    <section class="contact">
        <h2>Contacto</h2>
        <p>Si deseas ponerte en contacto con nosotros, puedes hacerlo a través de los siguientes medios:</p>
        <ul>
            <li><i class="fas fa-envelope"></i> Correo Electrónico: info@nuestraempresa.com</li>
            <li><i class="fas fa-phone"></i> Teléfono: +123 456 789</li>
            <li><i class="fas fa-map-marker"></i> Dirección: Calle Principal, Ciudad, País</li>
            <button onclick="window.location.href='catalogo.php'">Regresar</button>
        </ul>
    </section>
    
</body>
</html>
