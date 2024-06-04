<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar Tags</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #ADD8E6, #98FB98); /* Azul claro difuminado a verde */
            color: #000;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background: linear-gradient(to bottom, #1E90FF, #00008B); /* Azul oscuro a azul difuminado */
            padding-top: 20px;
            box-sizing: border-box;
            border-top-right-radius: 20px; /* Redondear esquina superior derecha */
            border-bottom-right-radius: 20px; /* Redondear esquina inferior derecha */
            transition: width 0.3s;
        }
        .sidebar:hover {
            width: 280px; /* Ajustar el ancho al ampliar */
        }
        .sidebar img {
            display: block;
            margin: 0 auto;
            width: 150px; /* Tamaño del logo */
            cursor: pointer;
            transition: transform 0.3s;
        }
        .sidebar img:hover {
            transform: scale(1.1); /* Animación de zoom al pasar el mouse */
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
            transform: scale(1.1); /* Animación de zoom al pasar el mouse */
        }
        .main-content {
            margin-left: 250px; /* Ajustar el margen para dejar espacio a la barra lateral */
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
            transform: scale(1.1); /* Animación de zoom al pasar el mouse */
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        }
        input[type="text"], input[type="number"], input[type="submit"] {
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
            transform: scale(1.1); /* Animación de zoom al pasar el mouse */
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </a>
    <div class="sidebar-text">Leer Tag</div>
    <div class="sidebar-text">Asignar Registro</div>
    <div class="sidebar-text">Opciones</div>
</div>

<div class="main-content">
    <h1 class="title">Configurar Tags</h1>
    <form id="tagForm" onsubmit="return guardarRegistro()">
        <label for="tag">No. Tag:</label><br>
        <input type="text" id="tag" name="tag" required><br>
        <label for="producto">Producto:</label><br>
        <input type="text" id="producto" name="producto" required><br>
        <label for="almacen">Almacén:</label><br>
        <input type="text" id="almacen" name="almacen" required><br>
        <label for="lote">Lote:</label><br>
        <input type="text" id="lote" name="lote" required><br>
        <label for="departamento">Departamento:</label><br>
        <input type="text" id="departamento" name="departamento" required><br>
        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" required><br><br>
        <input type="submit" value="Guardar Registro">
    </form>
</div>

<script>
    function guardarRegistro() {
        // Simular envío de formulario y mostrar mensaje de éxito
        alert("Registro Exitoso");
        return false; // Evitar recargar la página
    }
</script>

</body>
</html>
