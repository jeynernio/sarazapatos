<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);

        Contacto::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
        ]);

        return back()->with('success', 'Mensaje enviado correctamente');
    }
}