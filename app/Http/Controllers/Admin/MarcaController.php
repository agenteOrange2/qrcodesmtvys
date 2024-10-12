<?php

namespace App\Http\Controllers\Admin;


use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $marcas = Marca::all(); // Obtener todas las marcas
        return view('admin.marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
        ]);
    
        $marca = new Marca();
        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreArchivo = time() . '_' . $imagen->getClientOriginalName(); // Guardar con el nombre original
            $marca->imagen = $imagen->storeAs('marcas', $nombreArchivo, 'public');
        }
    
        $marca->save();

        Session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Marca Creada!',
            'text' => 'Marca creada correctamente.',
        ]);        
    
        return redirect()->route('admin.marcas.index');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $marca = Marca::findOrFail($id); // Recuperar la marca a editar
        return view('admin.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;
    
        // Eliminar la imagen actual si el usuario lo solicita
        if ($request->remove_image == 'true' && $marca->imagen && Storage::exists('public/' . $marca->imagen)) {
            Storage::delete('public/' . $marca->imagen);
            $marca->imagen = null;
        }
    
        // Si el usuario sube una nueva imagen, la guardamos
        if ($request->hasFile('imagen')) {
            if ($marca->imagen && Storage::exists('public/' . $marca->imagen)) {
                Storage::delete('public/' . $marca->imagen);
            }
    
            $imagen = $request->file('imagen');
            $nombreArchivo = time() . '_' . $imagen->getClientOriginalName(); // Guardar con el nombre original
            $marca->imagen = $imagen->storeAs('marcas', $nombreArchivo, 'public');
        }
    
        $marca->save();
    
        Session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Marca Actualizada!',
            'text' => 'Marca actualizada correctamente.',
        ]);
    
        return redirect()->route('admin.marcas.index');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($marca->imagen && Storage::exists('public/' . $marca->imagen)) {
            Storage::delete('public/' . $marca->imagen);
        }

        $marca->delete();

        Session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Marca Eliminada!',
            'text' => 'La marca ha sido eliminada correctamente.',
        ]);

        return redirect()->route('admin.marcas.index');
    }
}
