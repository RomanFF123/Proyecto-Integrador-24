<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Dispositivo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right bottom, #ffd900, #ff5100);
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.8); 
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 150px;
            cursor: pointer;
            transition: transform 0.3s; 
        }
        .logo:hover {
            transform: scale(1.1); 
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s; 
        }
        button:hover {
            background-color: #0056b3;
            transform: scale(1.1); 
        }
    </style>
</head>
<body>

<img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" onclick="window.location.href='/  '">

<div class="container">
    <h1 class="title">Agregar Dispositivo</h1>
    <form>
        <label for="nombre">Nombre de Dispositivo:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="serie">No. de Serie:</label><br>
        <input type="text" id="serie" name="serie"><br>
        <label for="antena">Antena Asignada:</label><br>
        <input type="text" id="antena" name="antena"><br>
        <label for="almacen">Almacén:</label><br>
        <input type="text" id="almacen" name="almacen"><br>
        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo"><br><br>
        <button type="button" onclick="guardarRegistro()">Guardar Registro</button>
    </form>
</div>

<script>
    function guardarRegistro() {
        alert("Registro guardado correctamente");
    }
</script>

</body>
</html>
