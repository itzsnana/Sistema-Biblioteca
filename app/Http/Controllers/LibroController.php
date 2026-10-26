<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with(['editorial', 'autores', 'categorias'])->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $editoriales = \App\Models\Editorial::all();
        $autores = \App\Models\Autor::all();
        $categorias = \App\Models\Categoria::all();
        
        return view('libros.create', compact('editoriales', 'autores', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $libro = Libro::create([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'published_year' => $request->published_year,
            'publisher_id' => $request->publisher_id,
        ]);

        if ($request->has('autores')) {
            $libro->autores()->attach($request->autores);
        }
        if ($request->has('categorias')) {
            $libro->categorias()->attach($request->categorias);
        }

        return redirect()->route('libros.index')->with('success', '¡Libro registrado exitosamente!');
    }
}