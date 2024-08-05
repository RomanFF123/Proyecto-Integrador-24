<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Fondo gris claro */
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background-color: #1E90FF; /* Azul oscuro */
            padding-top: 20px;
            box-sizing: border-box;
            transition: width 0.3s;
            border-top-right-radius: 20px; /* Curvar esquina superior derecha */
            border-bottom-right-radius: 20px; /* Curvar esquina inferior derecha */
        }
        .sidebar:hover {
            width: 280px; /* Ajustar el ancho al ampliar */
        }
        .sidebar img {
            display: block;
            margin: 0 auto;
            width: 150px; /* Aumentar el tamaño del logo */
            cursor: pointer;
            transition: transform 0.3s;
        }
        .sidebar img:hover {
            transform: scale(1.1); /* Zoom al pasar el mouse */
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
            transform: scale(1.1); /* Zoom al pasar el mouse */
        }
        .main-content {
            margin-left: 250px; /* Ajustar el margen para dejar espacio a la barra lateral */
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container input[type="tel"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #1E90FF;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #1C86EE;
        }
        .form-container .form-row {
            margin-bottom: 10px;
        }
        .form-container .form-row input {
            width: calc(100% - 22px); /* Ajustar el ancho para el padding y border */
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" onclick="window.location.href='/'">
    <div class="sidebar-text">Pausar</div>
    <div class="sidebar-text">Reanudar</div>
    <div class="sidebar-text">Opciones</div>
    <div class="sidebar-text">Notificaciones</div>
</div>

<div class="main-content">
    <div class="form-container">
        <h2>Formulario de Registro</h2>
        <form action="/register" method="post">
            <div class="form-row">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-row">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-row">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-row">
                <label for="confirm-password">Confirmar Contraseña:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>

            <div class="form-row">
                <label for="phone">Teléfono (opcional):</label>
                <input type="tel" id="phone" name="phone">
            </div>

            <div class="form-row">
                <label for="address">Dirección (opcional):</label>
                <input type="text" id="address" name="address">
            </div>

            <input type="submit" value="Registrar">
        </form>
    </div>
</div>

</body>
</html>
