<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\StatusUpdated; // Importar el evento si es necesario para actualizaciones en tiempo real

class sistemaController extends Controller
{
    // Método para mostrar la vista de inicio
    public function metodoInicio()
    {
        return view('inicio'); // Asegúrate de tener una vista 'inicio.blade.php'
    }

    // Método para mostrar el formulario de registro
    public function metodoRegistro()
    {
        return view('registro'); // Asegúrate de tener una vista 'registro.blade.php'
    }

    // Método para mostrar la vista de base de datos
    public function metodoBaseDatos()
    {
        return view('basedatos'); // Asegúrate de tener una vista 'basedatos.blade.php'
    }

    // Método para mostrar la vista de agregar dispositivo
    public function metodoAgregar()
    {
        return view('agregar'); // Asegúrate de tener una vista 'agregar.blade.php'
    }

    // Método para mostrar la vista de configurar tags
    public function metodoConfigurar()
    {
        return view('configurar'); // Asegúrate de tener una vista 'configurar.blade.php'
    }

    // Método para mostrar la vista de inicio de sesión
    public function metodoLogin()
    {
        return view('login'); // Asegúrate de tener una vista 'login.blade.php'
    }

    // (Opcional) Método para manejar actualizaciones de estado si es necesario
    public function checkStatus()
    {
        $status = ['connected' => true]; // Simulación del estado, cambia según sea necesario

        // Emitir un evento si es necesario para actualizaciones en tiempo real
        event(new StatusUpdated($status['connected']));

        return response()->json($status);
    }
}
