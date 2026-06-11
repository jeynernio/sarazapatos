<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'nullable|max:20',
            'password' => 'required|min:6'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Usuario registrado correctamente');
    }

    //usuario
   public function login(Request $request)
{
    $usuario = Usuario::where('email', $request->email)->first();

    if (!$usuario) {
        return back()->with('error', 'Correo no encontrado');
    }

    if (!Hash::check($request->password, $usuario->password)) {
        return back()->with('error', 'Contraseña incorrecta');
    }

    session([
        'usuario_id' => $usuario->id,
        'usuario_nombre' => $usuario->nombre,
        'usuario_email' => $usuario->email
    ]);

    return redirect('/dashboard');
}


}