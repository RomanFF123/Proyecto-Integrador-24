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
    #login-form {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        position: relative;
    }
    #login-form h2 {
        text-align: center;
    }
    #login-form input[type="text"],
    #login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    #login-form input[type="submit"] {
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
</style>
</head>
<body>

<img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo">

<div id="login-form">
    <h2>Iniciar Sesión</h2>
    <form id="form">
        <input type="text" id="username" name="username" placeholder="Usuario">
        <input type="password" id="password" name="password" placeholder="Contraseña">
        <input type="submit" value="Iniciar Sesión">
    </form>
    <div id="error-msg" class="error" style="display: none;"></div>
</div>

<script>
    document.getElementById("form").addEventListener("submit", function(event) {
        event.preventDefault();
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

    
        if ((username === "luis" && password === "1234") || (username === "simon" && password === "0000")) {
           
            window.location.href = "integrador.html";
        } else {
           
            document.getElementById("error-msg").innerText = "Usuario o contraseña incorrectos.";
            document.getElementById("error-msg").style.display = "block";
        }
    });
</script>

</body>
</html>
