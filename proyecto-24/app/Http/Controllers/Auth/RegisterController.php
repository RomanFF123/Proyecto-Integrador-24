<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:255'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'rol' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'ends_with:@upq.edu.mx', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Usuario::create([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'] ?? '', // Asigna un valor vacío si no está presente
            'direccion' => $data['direccion'] ?? '', // Asigna un valor vacío si no está presente
            'rol' => $data['rol'] ?? '', // Asigna un valor vacío si no está presente
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

