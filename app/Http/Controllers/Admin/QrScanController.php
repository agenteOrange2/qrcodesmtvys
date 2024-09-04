<?php

namespace App\Http\Controllers\Admin;

use App\Models\QrScan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QrScanController extends Controller
{
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
    

    public function index()
    {
        $scans = QrScan::with('user')->get();

        return view('admin.scanner.index', compact('scans'));
    }
}
