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
    #login-form,
    #register-form {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        position: relative;
        width: 300px;
    }
    #login-form h2,
    #register-form h2 {
        text-align: center;
    }
    #login-form input[type="text"],
    #login-form input[type="password"],
    #register-form input[type="text"],
    #register-form input[type="password"],
    #register-form input[type="email"],
    #register-form input[type="tel"] {
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
    .toggle-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        margin: 10px auto;
    }
    .toggle-btn:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo">

<div id="login-form">
    <h2>Iniciar Sesión</h2>
    <form id="loginForm" action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" id="login-username" name="username" placeholder="Usuario" required>
        <input type="password" id="login-password" name="password" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <div id="login-error-msg" class="error" style="display: none;"></div>
    <button class="toggle-btn" onclick="toggleForms()">Registrar</button>
</div>

<div id="register-form" style="display: none;">
    <h2>Registro</h2>
    <form id="registerForm" action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" id="register-name" name="name" placeholder="Nombre" required>
        <input type="tel" id="register-phone" name="phone" placeholder="Teléfono" required>
        <input type="text" id="register-address" name="address" placeholder="Domicilio" required>
        <input type="text" id="register-role" name="role" placeholder="Rol" required>
        <input type="email" id="register-email" name="email" placeholder="Correo Electrónico" required>
        <input type="password" id="register-password" name="password" placeholder="Contraseña" required>
        <input type="password" id="register-password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
        <input type="submit" value="Registrarse">
    </form>
    <div id="register-error-msg" class="error" style="display: none;"></div>
    <button class="toggle-btn" onclick="toggleForms()">Iniciar Sesión</button>
</div>

<script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var username = document.getElementById("login-username").value;
        var password = document.getElementById("login-password").value;

        // Aquí se puede agregar una validación adicional si se desea
        if ((username === "luis" && password === "1234") || (username === "simon" && password === "0000")) {
            document.getElementById("loginForm").submit();
        } else {
            document.getElementById("login-error-msg").innerText = "Usuario o contraseña incorrectos.";
            document.getElementById("login-error-msg").style.display = "block";
        }
    });

    document.getElementById("registerForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var email = document.getElementById("register-email").value;
        var registerErrorMsg = document.getElementById("register-error-msg");

        if (!email.endsWith("@upq.edu.mx")) {
            registerErrorMsg.innerText = "El correo electrónico debe terminar con @upq.edu.mx";
            registerErrorMsg.style.display = "block";
        } else {
            registerErrorMsg.style.display = "none";
            document.getElementById("registerForm").submit();
        }
    });

    function toggleForms() {
        var loginForm = document.getElementById("login-form");
        var registerForm = document.getElementById("register-form");
        if (loginForm.style.display === "none") {
            loginForm.style.display = "block";
            registerForm.style.display = "none";
        } else {
            loginForm.style.display = "none";
            registerForm.style.display = "block";
        }
    }
</script>

</body>
</html>
