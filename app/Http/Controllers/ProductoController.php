<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'required|image'
        ]);

        try {
            $path = $request->file('imagen')->store('public/imagenes');

            Producto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'imagen' => $path
            ]);

            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar el producto: ' . $e->getMessage()]);
        }
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'sometimes|image'
        ]);

        try {
            $data = $request->all();
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('public/imagenes');
                $data['imagen'] = $path;
            }

            $producto->update($data);

            return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al actualizar el producto: ' . $e->getMessage()]);
        }
    }

    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al eliminar el producto: ' . $e->getMessage()]);
        }
    }
}

