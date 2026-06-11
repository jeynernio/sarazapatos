<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resena;

class ResenaController extends Controller
{
    public function guardar(Request $request)
    {
        Resena::create([
            'nombre' => $request->nombre,
            'estrellas' => $request->estrellas,
            'comentario' => $request->comentario,
        ]);

        return back()->with('success', 'Reseña guardada correctamente');
    }
}