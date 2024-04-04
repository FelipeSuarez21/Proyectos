<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindMatch Manager</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #3498db;
            padding: 20px;
            color: #fff;
            text-align: center;
            font-size: 32px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Espaciado entre los botones */
        button + button {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        MindMatch Manager
    </header>

    <!-- Formulario para inserción y actualización -->
    <form id="formulario">
        <label for="idUsuario">Seleccionar Usuario:</label>
        <select id="idUsuario">
            <!-- Aquí deberías llenar dinámicamente las opciones con los IDs de usuarios disponibles -->
            <option value="1">Usuario 1</option>
            <option value="2">Usuario 2</option>
            <!-- ... más opciones ... -->
        </select>

        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" required>

        <label for="genero">Género:</label>
        <select id="genero">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento">

        <label for="numeroIdentificacion">Número de Identificación:</label>
        <input type="text" id="numeroIdentificacion" required>

        <!-- Botones para acciones -->
        <button type="button" onclick="insertarUsuario()">Insertar Usuario</button>
        <button type="button" onclick="actualizarUsuario()">Actualizar Usuario</button>
    </form>

    <!-- Tabla para mostrar datos -->
    <table id="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Género</th>
                <th>Fecha de Nacimiento</th>
                <th>Número de Identificación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se mostrarán los registros de la base de datos -->
        </tbody>
    </table>

    <script>
        // Función para insertar un nuevo usuario
        function insertarUsuario() {
            // Obtener valores del formulario
            var nombre = document.getElementById('nombre').value;
            var genero = document.getElementById('genero').value;
            var fechaNacimiento = document.getElementById('fechaNacimiento').value;
            var numeroIdentificacion = document.getElementById('numeroIdentificacion').value;

            // Aquí deberías enviar estos valores al servidor para insertar en la base de datos
            // Después de realizar la acción, actualiza la tabla
            actualizarTabla();
        }

        // Función para actualizar un usuario existente
        function actualizarUsuario() {
            // Obtener el ID del usuario seleccionado
            var idUsuario = document.getElementById('idUsuario').value;

            // Obtener valores del formulario
            var nombre = document.getElementById('nombre').value;
            var genero = document.getElementById('genero').value;
            var fechaNacimiento = document.getElementById('fechaNacimiento').value;
            var numeroIdentificacion = document.getElementById('numeroIdentificacion').value;

            // Aquí deberías enviar el ID y los nuevos valores al servidor para actualizar en la base de datos
            // Después de realizar la acción, actualiza la tabla
            actualizarTabla();
        }

        // Función para eliminar un usuario
        function eliminarUsuario(idUsuario) {
            // Aquí deberías enviar el ID al servidor para eliminar el usuario en la base de datos
            // Después de realizar la acción, actualiza la tabla
            actualizarTabla();
        }

        // Función para actualizar la tabla (simulada con datos de ejemplo)
        function actualizarTabla() {
            // Datos de ejemplo (puedes reemplazar esto con datos reales obtenidos del servidor)
            var datos = [
                { id: 1, nombre: 'Usuario 1', genero: 'Masculino', fechaNacimiento: '1990-01-01', numeroIdentificacion: '123456789' },
                { id: 2, nombre: 'Usuario 2', genero: 'Femenino', fechaNacimiento: '1985-05-15', numeroIdentificacion: '987654321' },
                // ... más datos ...
            ];

            var tabla = document.getElementById('tabla');
            var tbody = tabla.getElementsByTagName('tbody')[0];

            // Limpiar la tabla antes de actualizar
            tbody.innerHTML = '';

            // Agregar filas a la tabla con los datos
            datos.forEach(function (dato) {
                var fila = tbody.insertRow();
                var celdaId = fila.insertCell(0);
                var celdaNombre = fila.insertCell(1);
                var celdaGenero = fila.insertCell(2);
                var celdaFechaNacimiento = fila.insertCell(3);
                var celdaNumeroIdentificacion = fila.insertCell(4);
                var celdaAcciones = fila.insertCell(5);

                celdaId.innerHTML = dato.id;
                celdaNombre.innerHTML = dato.nombre;
                celdaGenero.innerHTML = dato.genero;
                celdaFechaNacimiento.innerHTML = dato.fechaNacimiento;
                celdaNumeroIdentificacion.innerHTML = dato.numeroIdentificacion;

                // Botón para eliminar con el evento onclick
                var botonEliminar = document.createElement('button');
                botonEliminar.innerHTML = 'Eliminar';
                botonEliminar.onclick = function() {
                    eliminarUsuario(dato.id);
                };

                // Agregar el botón a la celda de acciones
                celdaAcciones.appendChild(botonEliminar);
            });
        }

        // Llama a la función de actualización de la tabla al cargar la página
        actualizarTabla();
    </script>

</body>
</html>
