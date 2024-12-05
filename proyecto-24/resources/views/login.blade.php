<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial Black', Arial, sans-serif;
            background: linear-gradient(to bottom, #ADD8E6, #98FB98);
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        #login-form, #register-form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
            position: relative;
            display: none;
        }
        #login-form.active, #register-form.active {
            display: block;
        }
        #login-form h2, #register-form h2 {
            text-align: center;
        }
        #login-form input[type="text"],
        #login-form input[type="password"],
        #register-form input[type="text"],
        #register-form input[type="password"],
        #register-form input[type="email"],
        #register-form input[type="tel"],
        #register-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        #login-form input[type="submit"],
        #register-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        #logo {
            position: absolute;
            top: 40px;
            left: 40px;
            width: 200px;
            height: auto;
        }
        #toggle-form {
            text-align: center;
            margin-top: 20px;
        }
        #toggle-form button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo">

    <div id="login-form" class="active">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" value="Iniciar Sesión">
        </form>
        @if ($errors->any())
            <div id="error-msg" class="error">
                {{ $errors->first() }}
            </div>
        @endif
        <div id="toggle-form">
            <button type="button" onclick="toggleForms()">Registrarse</button>
        </div>
    </div>

    <div id="register-form">
        <h2>Registro</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="tel" name="telefono" placeholder="Teléfono">
            <input type="text" name="direccion" placeholder="Dirección">
            <input type="text" name="rol" placeholder="Rol">
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
        @if ($errors->any())
            <div id="error-ms g" class="error">
                {{ $errors->first() }}
            </div>
        @endif
        <div id="toggle-form">
            <button type="button" onclick="toggleForms()">Iniciar Sesión</button>
        </div>
    </div>

    <script>
        function toggleForms() {
            document.getElementById('login-form').classList.toggle('active');
            document.getElementById('register-form').classList.toggle('active');
        }
    </script>

</body>
</html>

