<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::with('user')->latest()->paginate(10);
        return view('panel.articulos.index', compact('articulos'));
    }

    public function create()
    {
        $categorias = Articulo::categorias();
        $regiones   = Articulo::regiones();
        return view('panel.articulos.create', compact('categorias', 'regiones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'categoria'   => 'required|string',
            'region'      => 'nullable|string',
            'descripcion' => 'required|string',
            'imagen'      => 'nullable|image|max:2048',
        ]);

        $data = $request->only('titulo', 'categoria', 'region', 'descripcion');
        $data['user_id'] = auth()->id();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('articulos', 'public');
        }

        Articulo::create($data);

        return redirect()->route('articulos.index')->with('success', 'Artículo creado exitosamente.');
    }

    public function show(Articulo $articulo)
    {
        return view('panel.articulos.show', compact('articulo'));
    }

    public function edit(Articulo $articulo)
    {
        $categorias = Articulo::categorias();
        $regiones   = Articulo::regiones();
        return view('panel.articulos.edit', compact('articulo', 'categorias', 'regiones'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'categoria'   => 'required|string',
            'region'      => 'nullable|string',
            'descripcion' => 'required|string',
            'imagen'      => 'nullable|image|max:2048',
        ]);

        $data = $request->only('titulo', 'categoria', 'region', 'descripcion');

        if ($request->hasFile('imagen')) {
            if ($articulo->imagen) {
                Storage::disk('public')->delete($articulo->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('articulos', 'public');
        }

        $articulo->update($data);

        return redirect()->route('articulos.index')->with('success', 'Artículo actualizado.');
    }

    public function destroy(Articulo $articulo)
    {
        if ($articulo->imagen) {
            Storage::disk('public')->delete($articulo->imagen);
        }
        $articulo->delete();

        return redirect()->route('articulos.index')->with('success', 'Artículo eliminado.');
    }
}
