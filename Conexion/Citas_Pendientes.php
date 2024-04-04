<?php
include("./Credenciales.php");

// Verifica si se ha enviado una solicitud para eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['citaId'])) {
    // Obtiene el ID de la cita a eliminar
    $citaId = $_POST['citaId'];

     // Realiza la eliminación en la base de datos
     $eliminarSql = "DELETE FROM Agendar_Cita WHERE Id = $citaId";
     if ($conexion->query($eliminarSql) === TRUE) {
        echo "<script>alert('Cita eliminada con éxito.');</script>";
     } else {
         echo "<script>alert('Error al eliminar la cita.');</script>";
     }
} 
 
// Recupera los datos de la base de datos después de la posible eliminación
$sql = "SELECT * FROM Agendar_Cita";
$result = $conexion->query($sql);

// Cierra la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Visualizar Citas</title>
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
        }

        main {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .cita {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .cita:hover {
            transform: translateY(-5px);
        }

        .cita-detalles {
            display: none;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        h2 {
            color: #3498db;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin: 5px 0;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .view-button,
        .delete-button,
        .back-button {
            flex: 1;
            background-color: #3498db;
            color: white;
            padding: 8px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px; /* Ajusta este valor según tu preferencia */
            text-align: center;
        }

        .delete-button {
            background-color: #e74c3c;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>Citas Pendientes</h1>
    </header>
    <main>
        <?php if ($result->num_rows > 0):?>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<div class='cita'>";
                echo "<h2>{$row['Nombre']}</h2>";
                echo "<p>Correo: {$row['Correo_Electronico']}</p>";
                echo "<p>Teléfono: {$row['Telefono']}</p>";
                echo "<p>Mensaje: {$row['Mensaje']}</p>";
                echo "<p>Fecha: {$row['Fecha']}</p>";
                // Botones de Acción
                echo "<div class='action-buttons'>";
                echo "<button class='back-button' onclick='regresar()'>Regresar</button>";
                echo "<button class='delete-button' onclick='eliminarCita({$row['Id']})'>Eliminar</button>";
                echo "</div>";

                echo "</div>";
            }
            ?>
        <?php endif;?>
    </main>

    <script>
        function mostrarDetalles(citaId) {
            var detalles = document.getElementById('detalles-' + citaId);
            detalles.style.display = detalles.style.display === 'none' ? 'block' : 'none';
        }

        
        function eliminarCita(citaId) {
            const data = new URLSearchParams();
            data.append('citaId', citaId);
            fetch('Citas_Pendientes.php', {
            method: 'POST',
            body: data
            }).then(function (response) {
        if (response.ok) {
         location.reload()
        }else {
        alert('Error al eliminar la cita')
    }
    })
        .catch(function (error) {
         console.log('Error al eliminar la cita');
    });
        } 

        function regresar() {
            window.location.href = 'psicologo.php';
        }
    </script>
</body>
</html>
