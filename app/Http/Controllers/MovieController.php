<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return response()->json($movies);
    }

    public function getOne($id)
    {
        $movie = Movie::where('id', $id)
            ->first();

        return response()->json($movie);
    }

    public function store(Request $request)
    {
        // Crea un nuevo registro
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->synopsis = $request->input('synopsis');
        $movie->year = $request->input('year');
        $movie->cover = $request->input('cover');

        // Guarda el registro en la base de datos
        $movie->save();

        // Devuelve una respuesta al cliente
        return response()->json($movie);

    }

    public function update(Request $request, $id)
    {
        // Busca la película que se va a actualizar por su ID
        $movie = Movie::find($id);

        // Si la película no se encuentra, devuelve un error
        if (!$movie) {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }

        // Actualiza los campos de la película con los valores proporcionados en la solicitud
        $movie->title = $request->input('title', $movie->title);
        $movie->synopsis = $request->input('synopsis', $movie->synopsis);
        $movie->year = $request->input('year', $movie->year);
        $movie->cover = $request->input('cover', $movie->cover);

        // Guarda los cambios en la base de datos
        $movie->save();

        // Devuelve la película actualizada como respuesta
        return response()->json($movie);
    }

    public function destroy($id)
    {
        // Obtiene el registro a eliminar
        $movie = Movie::find($id);

        // Elimina el registro de la base de datos
        $movie->delete();

        // Devuelve una respuesta al cliente
        return response()->json(["success" => true], 200);
    }
}
