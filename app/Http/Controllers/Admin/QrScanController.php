<?php

namespace App\Http\Controllers\Admin;

use App\Models\QrScan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QrScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scans = QrScan::with('user')->get();

        return view('admin.scanner.index', compact('scans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Entrando al método store de QrScanController');

        try {
            // Validar y procesar los datos recibidos
            $data = $request->validate([
                'nombre' => 'nullable|string|max:255',
                'apellidos' => 'nullable|string|max:255',
                'puesto' => 'nullable|string|max:255',
                'empresa' => 'nullable|string|max:255',
                'telefono' => 'nullable|string|max:255',
                'rol' => 'nullable|string|max:255',
                'correo' => 'nullable|string|max:255',
                'campos_adicionales' => 'nullable|array',
            ]);


            // Verificar si ya existe un registro con el mismo correo
            $existingScan = QrScan::where('correo', $data['correo'])->first();

            if ($existingScan) {
                Log::warning('El usuario ya ha sido registrado previamente:', ['correo' => $data['correo']]);
                return response()->json(['error' => 'Este usuario ya fue registrado previamente.'], 409);
            }

            Log::info('Datos validados correctamente:', $data);

            // Convertir campos adicionales a JSON
            $data['campos_adicionales'] = json_encode($data['campos_adicionales']);
            $data['user_id'] = Auth::id();

            // Crear el registro
            $qrScan = QrScan::create($data);

            Log::info('Registro creado correctamente:', $qrScan->toArray());

            return response()->json(['message' => 'Escaneo guardado exitosamente.'], 200);
        } catch (\Exception $e) {
            Log::error('Error durante el almacenamiento:', ['exception' => $e->getMessage()]);
            return response()->json(['error' => 'Error durante el almacenamiento'], 500);
        }
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
    public function edit(QrScan $usuarios_capturado)
    {
        // Decodificar los campos adicionales
        $campos_adicionales = json_decode($usuarios_capturado->campos_adicionales, true);

        // Si es null o vacío, asignar una cadena vacía
        $campos_adicionales_formateados = $campos_adicionales && is_array($campos_adicionales)
            ? implode("\n", $campos_adicionales)
            : '';

        // Pasar los datos formateados a la vista
        return view('admin.scanner.edit', compact('usuarios_capturado', 'campos_adicionales_formateados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QrScan $usuarios_capturado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'puesto' => 'nullable|string|max:255',
            'correo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'rol' => 'nullable|string|max:255',
            'campos_adicionales' => 'nullable|string', // Cambia el campo a string
        ]);
    
        // Convertir los datos adicionales a array si están presentes
        if ($request->filled('campos_adicionales')) {
            $usuarios_capturado->campos_adicionales = json_encode(explode("\n", $request->campos_adicionales));
        }
    
        // Actualizar el registro
        $usuarios_capturado->update($request->except('campos_adicionales')); // Excluir campos_adicionales si ya fue actualizado
    
        return redirect()->route('admin.usuarios-capturados.index');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
