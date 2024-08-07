<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #ADD8E6, #98FB98);
            color: #000;
        }
        .main-content {
            padding: 20px;
            text-align: center;
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
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
            transform: scale(1.1);
        }
        #logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 200px;
            height: auto;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="main-content">
    <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo" onclick="redirectToHome()">

    <h1 class="title">Registrar Producto</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="almacen">Almacén:</label>
        <input type="text" id="almacen" name="almacen" required>
        
        <label for="lote">Lote:</label>
        <input type="text" id="lote" name="lote" required>
        
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required>
        
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        
        <input type="submit" value="Guardar Registro">
    </form>
</div>

<script>
    function redirectToHome() {
        window.location.href = "{{ route('home') }}";
    }
</script>

</body>
</html>
