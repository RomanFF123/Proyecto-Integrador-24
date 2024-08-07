<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar Tags</title>
    <style>
        /* Styles for the page */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #ADD8E6, #98FB98); /* Azul claro a verde */
            color: #000;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background: linear-gradient(to bottom, #1E90FF, #00008B); /* Azul oscuro a azul */
            padding-top: 20px;
            box-sizing: border-box;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            transition: width 0.3s;
        }
        .sidebar:hover {
            width: 280px;
        }
        .sidebar img {
            display: block;
            margin: 0 auto;
            width: 150px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .sidebar img:hover {
            transform: scale(1.1);
        }
        .sidebar-text {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .sidebar-text:hover {
            transform: scale(1.1);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff;
            transition: transform 0.3s;
        }
        .title:hover {
            transform: scale(1.1);
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        }
        input[type="text"], input[type="number"], input[type="submit"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: transform 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
    <script>
        // Función para actualizar el campo de código en el formulario
        function updateCodigo(value) {
            document.getElementById('codigo').value = value;
        }

        // Función para leer datos desde el puerto serie usando WebSocket
        function initSerial() {
            const ws = new WebSocket('ws://localhost:8080'); // Cambia la URL si es necesario

            ws.onmessage = function(event) {
                let data;

                if (typeof event.data === 'string') {
                    data = event.data;
                } else if (event.data instanceof Blob) {
                    event.data.text().then(text => {
                        data = text;
                        console.log('Mensaje convertido a texto:', data);
                        processData(data);
                    }).catch(error => {
                        console.error('Error al convertir el mensaje a texto:', error);
                    });
                } else {
                    console.error('Tipo de dato no soportado:', event.data);
                }

                function processData(data) {
                    console.log('Mensaje procesado:', data);  // Muestra el mensaje en la consola
                    if (data.startsWith('U')) { // Verifica que el dato es un tag
                        console.log('UID detectado:', data.substring(1).trim());
                        updateCodigo(data.substring(1).trim()); // Actualiza el campo de código
                    }
                }
            };

            ws.onopen = function() {
                console.log('Conectado al WebSocket');
            };

            ws.onclose = function() {
                console.log('Desconectado del WebSocket');
            };

            ws.onerror = function(error) {
                console.log('Error: ' + error.message);
            };
        }

        window.onload = initSerial; // Inicializa la conexión cuando la ventana cargue
    </script>
</head>
<body>

<div class="sidebar">
    <a href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </a>
    <div class="sidebar-text">Leer Tag</div>
    <div class="sidebar-text">Asignar Registro</div>
</div>

<div class="main-content">
    <h1 class="title">Configurar Tags</h1>
    <form id="tagForm" action="{{ route('tags.store') }}" method="POST">
        @csrf
        <label for="codigo">Código:</label><br>
        <input type="text" id="codigo" name="codigo" required><br>
        <label for="descripcion">Descripción:</label><br>
        <input type="text" id="descripcion" name="descripcion" required><br>
        <label for="id_producto">Seleccionar Producto:</label><br>
        <select id="id_producto" name="id_producto" required>
            <option value="">Selecciona un producto</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select><br><br>
        <input type="submit" value="Guardar Registro">
    </form>

    <!-- Mostrar la tabla de productos -->
    <h2>Lista de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Almacén</th>
                <th>Lote</th>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->almacen }}</td>
                <td>{{ $producto->lote }}</td>
                <td>{{ $producto->Categoria }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->cantidad }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
