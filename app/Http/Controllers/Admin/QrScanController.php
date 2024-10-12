<?php

namespace App\Http\Controllers\Admin;

use App\Models\Marca;
use App\Models\QrScan;
use Illuminate\Http\Request;
use App\Exports\UserQrScanExport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class QrScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Contador total de escaneos (solo para administradores)
        $totalScanCount = QrScan::count();

        // Obtener todas las marcas
        $marcas = Marca::all(); // Obtenemos todas las marcas para los checkboxes

        // Verificar si el usuario es Administrador
        if (Auth::user()->hasRole('Administrador')) {
            // Administrador ve todos los registros
            $scans = QrScan::with('user')->get();
        } else {
            // Usuarios con rol distinto a Administrador solo ven sus propios registros
            $scans = QrScan::where('user_id', Auth::id())->with('user')->get();
        }

        // Contador de escaneos
        $scanCount = $scans->count();

        return view('admin.scanner.index', compact('scans', 'scanCount', 'totalScanCount', 'marcas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Entrando al método store de QrScanController');

        // Ver el contenido de la solicitud para depuración
        Log::debug($request->all());

        try {
            // Validar los datos recibidos
            $data = $request->validate([
                'nombre' => 'nullable|string|max:255',
                'apellidos' => 'nullable|string|max:255',
                'puesto' => 'nullable|string|max:255',
                'empresa' => 'nullable|string|max:255',
                'telefono' => 'nullable|string|max:255',
                'rol' => 'nullable|string|max:255',
                'correo' => 'nullable|string|max:255',
                'marcas' => 'nullable|array', // Marcas seleccionadas
                'comentarios' => 'nullable|array', // Comentarios asociados a las marcas
                'campos_adicionales' => 'nullable|array', // Campos adicionales
            ]);

            // Verificar si ya existe un registro con el mismo correo
            $existingScan = QrScan::where('correo', $data['correo'])->first();

            if ($existingScan) {
                Log::warning('El usuario ya ha sido registrado previamente:', ['correo' => $data['correo']]);
                return response()->json(['error' => 'Este usuario ya fue registrado previamente.'], 409);
            }

            Log::info('Datos validados correctamente:', $data);

            // Guardar campos adicionales como JSON
            $data['campos_adicionales'] = json_encode($data['campos_adicionales']);
            $data['user_id'] = Auth::id();

            // Crear el registro de escaneo
            $qrScan = QrScan::create($data);

            Log::info('Registro creado correctamente:', $qrScan->toArray());

            // Guardar las marcas seleccionadas y sus comentarios en la tabla pivot
            if (!empty($data['marcas'])) {
                foreach ($data['marcas'] as $marcaId) {
                    $comentario = $data['comentarios'][$marcaId] ?? null; // Obtener el comentario si existe
                    $qrScan->marcas()->attach($marcaId, ['comentarios' => $comentario]);
                }
            }

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

    public function export()
    {
        return Excel::download(new UserQrScanExport, 'usuarios_capturados.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QrScan $usuarios_capturado)
    {
        // Obtener todas las marcas disponibles
        $marcas = Marca::all();

        // Obtener las marcas seleccionadas para este escaneo, junto con sus comentarios
        $marcasSeleccionadas = $usuarios_capturado->marcas->pluck('id')->toArray();
        $comentarios = $usuarios_capturado->marcas->pluck('pivot.comentarios', 'id')->toArray(); // Comentarios del pivot

        // Decodificar los campos adicionales del JSON
        $campos_adicionales = json_decode($usuarios_capturado->campos_adicionales, true);

        // Formatear los campos adicionales como una cadena para mostrar en la textarea
        $campos_adicionales_formateados = $campos_adicionales ? implode("\n", $campos_adicionales) : '';

        // Pasar los datos a la vista
        return view('admin.scanner.edit', compact(
            'usuarios_capturado',
            'marcas',
            'marcasSeleccionadas',
            'comentarios',
            'campos_adicionales_formateados'
        ));
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
            'campos_adicionales' => 'nullable|string',
            'marcas' => 'nullable|array', // Marcas seleccionadas
            'comentarios' => 'nullable|array', // Comentarios asociados
        ]);
    
        // Actualizar el registro
        $usuarios_capturado->update($request->except('marcas', 'comentarios'));
    
        // Actualizar marcas y comentarios en la tabla pivot
        $usuarios_capturado->marcas()->detach(); // Eliminar las marcas anteriores
        if ($request->filled('marcas')) {
            foreach ($request->marcas as $marcaId) {
                $comentario = $request->comentarios[$marcaId] ?? null;
                $usuarios_capturado->marcas()->attach($marcaId, ['comentarios' => $comentario]);
            }
        }
    
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
