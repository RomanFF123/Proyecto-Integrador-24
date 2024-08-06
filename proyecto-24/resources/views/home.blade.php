<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial Black', Arial, sans-serif;
            background: linear-gradient(to bottom right, #0074D9, #001f3f);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
        }
        #logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 200px;
            height: auto;
        }
        #container {
            display: flex;
            justify-content: center;
            width: 90%;
        }
        .icon {
            width: 20%;
            height: auto;
            margin: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .icon img {
            width: 80%;
            height: auto;
        }
        .icon-text {
            font-size: 14px;
        }
        .logout-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .logout-container a {
            color: #fff;
            text-decoration: none;
            background-color: #ff4d4d;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .logout-container a:hover {
            background-color: #cc0000;
        }
        #status-indicator {
            background-color: red;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        @method('POST')
    </form>

    <div id="container">
        <div class="icon" onclick="window.location.href='{{ route('register') }}'">
            <img src="{{ asset('images/registro.png') }}" alt="Registro">
            <div class="icon-text">Registro</div>
        </div>
        <div class="icon" onclick="window.location.href='{{ route('status') }}'">
            <img src="{{ asset('images/estado.png') }}" alt="Estado">
            <div class="icon-text">Estado</div>
        </div>
        <div class="icon" onclick="window.location.href='{{ route('configurar') }}'">
            <img src="{{ asset('images/configuracion.png') }}" alt="Configuración">
            <div class="icon-text">Configuración</div>
        </div>
    </div>

    <div class="logout-container">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar Sesión
        </a>
        <p id="connection-status" style="color: white;">
            Estado: <span id="status-text">{{ session('connection_status', 'Desconectado') }}</span>
            <span id="status-indicator"></span>
        </p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@pusher/pusher-js@7.0.3/dist/pusher.min.js"></script>
    <script>
        const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
        });

        const channel = pusher.subscribe('status-channel');
        channel.bind('App\\Events\\StatusUpdated', function(data) {
            const statusText = document.getElementById('status-text');
            const statusIndicator = document.getElementById('status-indicator');
            if (data.status === 'CONNECTED') {
                statusText.textContent = 'Conectado';
                statusIndicator.style.backgroundColor = 'green';
            } else {
                statusText.textContent = 'Desconectado';
                statusIndicator.style.backgroundColor = 'red';
            }
        });

        function updateConnectionStatus() {
            fetch('{{ route('status.update') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: 'CONNECTED' })
            })
            .then(response => response.json())
            .then(data => {
                const statusText = document.getElementById('status-text');
                const statusIndicator = document.getElementById('status-indicator');
                if (data.status === 'CONNECTED') {
                    statusText.textContent = 'Conectado';
                    statusIndicator.style.backgroundColor = 'green';
                } else {
                    statusText.textContent = 'Desconectado';
                    statusIndicator.style.backgroundColor = 'red';
                }
            });
        }

        // Llama a esta función para actualizar el estado
        updateConnectionStatus();
    </script>
</body>
</html>



