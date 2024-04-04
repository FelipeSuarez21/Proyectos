<?php
include("Credenciales.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];
    $fecha = $_POST["fecha"];
    //$hora = $_POST["hora"];



    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Prepara la consulta SQL
    $sql = "INSERT INTO Agendar_Cita (Nombre, Correo_Electronico, Telefono, Mensaje, Fecha) VALUES ('$nombre', '$email', '$telefono', '$mensaje', '$fecha')";

    // Ejecuta la consulta
    if ($conexion->query($sql) === TRUE) {
        // Éxito al insertar en la base de datos
    } else {
        // Error al insertar en la base de datos
        echo "Error al insertar datos: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Agendar Cita</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ecf0f1;
        }

        section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            width: 90%;
            transition: transform 0.3s ease-in-out;
        }

        h2 {
            color: #3498db;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            color: #555;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .button-secondary {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .button-secondary:hover {
            background-color: #c0392b;
        }

        .button-group .button-secondary {
            margin-left: 10px;
        }

        @media screen and (max-width: 600px) {
            section {
                width: 100%;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("citaForm");

            form.addEventListener("submit", function (event) {
                event.preventDefault();

                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "agendas.php", true);
                xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

                xhr.onload = function () {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert("Cita agendada con éxito");
                        } else {
                            alert("Error al agendar la cita: " + response.error);
                        }
                    } else {
                        alert("Error al enviar el formulario");
                    }
                };

                xhr.send(formData);
            });
        });
    </script>
</head>

<body>
    <section>
        <h2>Agendar Cita</h2>
        <p>Para agendar una cita, por favor completa el siguiente formulario:</p>
        <form id="citaForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

            <label for="fecha">Fecha:</label>
            <input type="datetime-local" id="fecha" name="fecha" required> 

            <!-- <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required> -->

            <div class="button-group">
                <button type="submit" class="button">Enviar</button>
                <button type="button" class="button-secondary" onclick="window.location.href='Catalogo_Psicologos.php'">Regresar</button>
            </div>
        </form>
    </section>
</body>

</html>
