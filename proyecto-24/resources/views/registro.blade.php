<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #fff; /* Fondo blanco */
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
        .grid-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 columnas */
            grid-template-rows: repeat(10, 1fr); /* 10 filas */
            gap: 2px; /* Espacio entre las celdas */
            padding: 20px;
            margin-left: 250px; /* Ajustar el margen para dejar espacio a la barra lateral */
            margin-top: 20px; /* Agregar espacio desde la parte superior */
        }
        .grid-item {
            border: 1px solid #000; /* Borde negro */
            padding: 10px;
            text-align: center;
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

<div class="grid-container">
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <!-- Puedes agregar más celdas según sea necesario -->
</div>

</body>
</html>
