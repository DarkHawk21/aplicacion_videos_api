<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
        $imagenes = Imagen::all();

        return response()->json($imagenes);
    }

    public function store(Request $request)
    {
        $imagen = new Imagen();
        $imagen->titulo = $request->input('titulo');
        $imagen->imagen = $request->input('imagen');
        $imagen->save();

        return response()->json($imagen);
    }

    public function destroy($id)
    {
        $imagen = Imagen::find($id);
        $imagen->delete();

        return response()->json(["success" => true], 200);
    }
}
