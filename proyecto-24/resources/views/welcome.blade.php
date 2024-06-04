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
    </style>
</head>
<body>
    <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo">

<div id="container">
    <div class="icon" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" onclick="redirectToRealTimeRegistration()">
        <img src="{{ asset('images/Registro-removebg-preview.png') }}" alt="Registro en Tiempo Real">
        <div class="icon-text">Registro en Tiempo Real</div>
    </div>
    <div class="icon" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" onclick="redirectToDatabase()">
        <img src="{{asset('images/base-removebg-preview.png')}}" alt="Base de Datos">
        <div class="icon-text">Base de Datos</div>
    </div>
    <div class="icon" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" onclick="redirectToAddDevice()">
        <img src="{{asset('images/agregar-removebg-preview.png')}}" alt="Agregar Dispositivo">
        <div class="icon-text">Agregar Dispositivo</div>
    </div>
    <div class="icon" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" onclick="redirectToConfigureTags()">
        <img src="{{asset('images/config-removebg-preview.png')}}" alt="Configurar Tags">
        <div class="icon-text">Configurar Tags</div>
    </div>
</div>

<script>
    function zoomIn(element) {
        element.style.transform = "scale(1.2)";
    }

    function zoomOut(element) {
        element.style.transform = "scale(1)";
    }

    function redirectToRealTimeRegistration() {
        window.location.href = "/registro";
    }

    function redirectToDatabase() {
        window.location.href = "/basedatos";
    }

    function redirectToAddDevice() {
        window.location.href = "/agregar";
    }

    function redirectToConfigureTags() {
        window.location.href = "/configurar";
    }
</script>

    
</body>
</html>
