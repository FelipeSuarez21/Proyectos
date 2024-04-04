<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindMatch - Clínica de Psicólogos</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos para la navegación y otros estilos anteriores... */

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .top-container {
            background-color: #2980b9;
            padding: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            display: inline-block;
            margin-bottom: 10px;
        }

        h1 {
            color: white;
            margin: 0;
            font-size: 32px;
            margin-bottom: 10px; /* Nuevo margen inferior */
        }

        nav {
            display: inline-block;
            margin-top: 10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline-block;
            margin-right: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
            cursor: pointer;
        }

        nav a:hover {
            color: #2979b9;
        }

        /* Nuevo estilo para el contenedor de información en la sección "¿Qué es MindMatch?" */
        .section-content-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            position: sticky;
            top: 0;
            text-align: center;
        }

        .section-info {
            max-width: 800px;
            margin: 0 auto;
            color: #555;
        }

        .section-info h2 {
            color: #3498db;
            margin-bottom: 15px;
        }

        .section-info p {
            margin-bottom: 15px;
        }

        .section-info ul {
            list-style: none;
            padding: 0;
            margin-bottom: 15px;
        }

        .section-info li {
            margin-bottom: 5px;
        }

        /* Estilos para el slider */
        .slider-container {
            position: relative;
            overflow: hidden;
            max-height: 500px;
            margin-top: 20px;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Animaciones para botones */
        button {
            transition: background-color 0.3s ease-in-out;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 12px; /* Aumentar el tamaño del padding */
            width: 100%;
            margin-top: 20px;
            font-size: 16px; /* Nuevo tamaño de fuente */
        }

        button:hover {
            background-color: #2979b9;
        }

        /* Estilos para el footer */
        footer {
            background-color: #2980b9;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>

    <div class="top-container">
        <header>
            <h1>MindMatch</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="perfiles.php">Registro</a></li>
            </ul>
        </nav>
    </div>

    <section id="que-es-mindmatch" class="section">
        <div class="container section-content-container">
            <h2>¿Qué es MindMatch?</h2>
            <div class="section-info">
                <p>Bienvenido a MindMatch, tu aliado dedicado al cuidado de la salud mental. Nos comprometemos a brindar apoyo y recursos a aquellos que buscan mejorar su bienestar emocional.</p>
                <p>En MindMatch, nos esforzamos por:</p>
                <ul>
                    <li>Ofrecer diagnósticos y terapia en línea con psicólogos certificados.</li>
                    <li>Proporcionar valiosos recursos educativos sobre salud mental y bienestar emocional.</li>
                    <li>Crear un catálogo diverso de psicólogos especializados para adaptarse a tus necesidades específicas.</li>
                    <li>Servir como un espacio seguro y accesible para tu crecimiento emocional y equilibrio mental.</li>
                </ul>
                <p>Únete a nosotros en el viaje hacia una mente más saludable y equilibrada.</p>
            </div>
        </div>
    </section>

    <section id="image-slider" class="section">
        <div class="container">
            <h2>Agenda tu cita ahora mismo </h2>
            <div class="slider-container">
                <div class="slider">
                    <img src="img/imgpsi1.jpg" alt="Image 1">
                    <img src="img/psiimg2.jfif" alt="Image 2">
                    <img src="img/psiimg3.jfif" alt="Image 3">
                    <!-- Agrega más imágenes según sea necesario -->
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 MindMatch - Clínica de Psicólogos</p>
        </div>
    </footer>

    <script>
        let currentSlide = 0;

        function showSlide(n) {
            const slides = document.querySelectorAll('.slider img');
            if (n >= slides.length) {
                currentSlide = 0;
            } else if (n < 0) {
                currentSlide = slides.length - 1;
            } else {
                currentSlide = n;
            }

            const transformValue = -currentSlide * 100 + '%';
            document.querySelector('.slider').style.transform = 'translateX(' + transformValue + ')';
        }

        function changeSlide(n) {
            showSlide(currentSlide + n);
        }

        function autoChangeSlide() {
            changeSlide(1);
        }

        setInterval(autoChangeSlide, 3000);

        showSlide(currentSlide);
    </script>
</body>
</html>
