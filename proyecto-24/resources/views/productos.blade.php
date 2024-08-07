<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Productos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #BBA9BB, #fdfd96); /* Gradiente de morado claro a anaranjado */
            min-height: 100vh; /* Asegura que el fondo cubra toda la altura de la ventana */
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background-color: #8C4966;
            padding-top: 20px;
            box-sizing: border-box;
            transition: width 0.3s;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
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
            cursor: default; /* Hace que no sea clickeable */
            transition: transform 0.3s;
        }
        .sidebar-text:hover {
            transform: scale(1.1);
        }
        .form-container {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #1E90FF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #1C86EE;
        }
        .success-message {
            color: green;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            display: none; /* Oculto por defecto */
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" onclick="window.location.href='/'">
    <div class="sidebar-text">Leer Tag</div>
</div>

<div class="form-container">
    <form id="productForm" method="POST" action="{{ route('productos.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="almacen">Almacén</label>
            <input type="text" id="almacen" name="almacen" required>
        </div>
        <div class="form-group">
            <label for="lote">Lote</label>
            <input type="text" id="lote" name="lote" readonly>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" id="categoria" name="categoria" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" required>
        </div>
        <div class="form-group">
            <button type="submit">Guardar Registro</button>
        </div>
    </form>

    <!-- Mensaje de registro exitoso -->
    <div id="successMessage" class="success-message">
        Registro Exitoso
    </div>
</div>

<script>
    let isPaused = false; // Estado de la lectura
    let lastUid = ''; // Para almacenar el último UID leído

    function initWebSocket() {
        const ws = new WebSocket('ws://localhost:8080'); // Cambia la URL si es necesario

        ws.onopen = function() {
            console.log('Conectado al WebSocket');
        };

        ws.onmessage = function(event) {
            let data;

            if (typeof event.data === 'string') {
                data = event.data;
            } else if (event.data instanceof Blob) {
                event.data.text().then(text => {
                    data = text;
                    if (!isPaused) {
                        processData(data);
                    }
                }).catch(error => {
                    console.error('Error al convertir el mensaje a texto:', error);
                });
            } else {
                console.error('Tipo de dato no soportado:', event.data);
            }

            if (data && !isPaused) {
                processData(data);
            }
        };

        ws.onclose = function() {
            console.log('Desconectado del WebSocket');
        };

        ws.onerror = function(error) {
            console.error('Error: ' + error.message);
        };

        function processData(data) {
            console.log('Mensaje procesado:', data);
            if (data.startsWith('U')) { // Verifica que el dato es un tag
                const uid = data.substring(1).trim();
                console.log('UID detectado:', uid);
                if (uid.length > 2) { // Verifica que el UID tenga más de 2 dígitos
                    lastUid = uid; // Actualiza el último UID leído
                    if (!isPaused) {
                        document.getElementById('lote').value = uid; // Llena el campo de lote con el UID
                    }
                }
            }
        }
    }

    window.onload = function() {
        initWebSocket(); // Inicializa la conexión cuando la ventana cargue

        // Mostrar mensaje de registro exitoso si está en la sesión
        @if (session('success'))
            document.getElementById('successMessage').style.display = 'block';
            setTimeout(() => {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000); // Oculta el mensaje después de 5 segundos
        @endif
    };
</script>

</body>
</html>
