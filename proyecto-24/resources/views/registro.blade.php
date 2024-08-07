<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        /* Estilos Generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        .sidebar .logo {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #575757;
        }

        .pause-button-container {
            margin-top: 20px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            background-color: #f4f4f4;
            overflow-y: auto;
        }

        .content h1 {
            font-size: 24px;
            margin-top: 0;
            text-align: center;
        }

        .tag-list {
            margin-bottom: 20px;
        }

        .tag-item {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .product-info {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .product-info h3 {
            margin-top: 0;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #pauseButton {
            background-color: #007bff;
            color: #fff;
        }

        #pauseButton.paused {
            background-color: #dc3545;
        }

        button:hover {
            opacity: 0.8;
        }

        .form-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script>
        let isPaused = false;
        const seenUids = new Set();
        const pausedTags = new Set();
        let ws;

        function updateTagList(tag) {
            const tagList = document.getElementById('tagList');
            const tagItem = document.createElement('div');
            tagItem.className = 'tag-item';
            tagItem.textContent = tag; 
            tagList.appendChild(tagItem);

            // Obtener información del producto
            fetch(`/producto/${tag}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                    } else {
                        displayProduct(data);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function displayProduct(product) {
            const tagList = document.getElementById('tagList');
            const productInfo = document.createElement('div');
            productInfo.className = 'product-info';
            productInfo.innerHTML = `
                <h3>Información del Producto</h3>
                <p><strong>Nombre:</strong> ${product.nombre}</p>
                <p><strong>Almacen:</strong> ${product.almacen}</p>
                <p><strong>Lote:</strong> ${product.lote}</p>
                <p><strong>Categoria:</strong> ${product.categoria}</p>
                <p><strong>Descripción:</strong> ${product.descripcion}</p>
                <p><strong>Precio:</strong> ${product.precio}</p>
                <p><strong>Cantidad:</strong> ${product.cantidad}</p>
            `;
            tagList.appendChild(productInfo);
        }

        function processData(data) {
            console.log('Mensaje procesado:', data);
            if (data.startsWith('U')) {
                const uid = data.substring(1).trim();
                console.log('UID detectado:', uid);
                if (uid.length > 2) {
                    if (!seenUids.has(uid)) {
                        seenUids.add(uid);
                        updateTagList(uid);
                    }
                }
            }
        }

        function initWebSocket() {
            ws = new WebSocket('ws://localhost:8080');

            ws.onopen = function() {
                console.log('Conectado al WebSocket');
            };

            ws.onmessage = function(event) {
                if (isPaused) {
                    return;
                }

                let data;

                if (typeof event.data === 'string') {
                    data = event.data;
                } else if (event.data instanceof Blob) {
                    event.data.text().then(text => {
                        data = text;
                        processData(data);
                    }).catch(error => {
                        console.error('Error al convertir el mensaje a texto:', error);
                    });
                } else {
                    console.error('Tipo de dato no soportado:', event.data);
                }
            };

            ws.onclose = function() {
                console.log('Desconectado del WebSocket');
            };

            ws.onerror = function(error) {
                console.error('Error: ' + error.message);
            };
        }

        function togglePause() {
            isPaused = !isPaused;
            const pauseButton = document.getElementById('pauseButton');
            if (isPaused) {
                pauseButton.textContent = 'Reanudar';
                pauseButton.classList.add('paused');
                if (ws) {
                    ws.onmessage = () => {};
                }
            } else {
                pauseButton.textContent = 'Pausar';
                pauseButton.classList.remove('paused');
                if (ws) {
                    ws.onmessage = function(event) {
                        let data;
                        if (typeof event.data === 'string') {
                            data = event.data;
                        } else if (event.data instanceof Blob) {
                            event.data.text().then(text => {
                                data = text;
                                processData(data);
                            }).catch(error => {
                                console.error('Error al convertir el mensaje a texto:', error);
                            });
                        } else {
                            console.error('Tipo de dato no soportado:', event.data);
                        }
                    };
                }
            }
        }

        window.onload = function() {
            initWebSocket();

            document.getElementById('pauseButton').addEventListener('click', togglePause);
        };
    </script>
</head>
<body>

<div class="sidebar">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
    <div class="pause-button-container">
        <button id="pauseButton">Pausar</button>
    </div>
    <ul>
        <li><a href="{{ route('RutaRegistro') }}">Registro en Tiempo Real</a></li>
        <li><a href="{{ route('basedatos') }}">Base de Datos</a></li>
        <li><a href="{{ route('RutaAgregar') }}">Agregar Dispositivo</a></li>
        <li><a href="{{ route('RutaConfigurar') }}">Configurar Tags</a></li>
    </ul>
</div>

<div class="content">
    <h1>Registro en Tiempo Real</h1>
    <div class="tag-list" id="tagList"></div>
</div>

<div class="form-container">
    <form action="{{ route('guardar-inventario') }}" method="POST">
        @csrf
        <input type="hidden" name="uids" :value="JSON.stringify([...seenUids])">
        <button type="submit">Guardar Inventario</button>
    </form>
</div>

</body>
</html>
