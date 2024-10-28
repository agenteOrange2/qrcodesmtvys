<?php

namespace App\Exports;

use App\Models\QrScan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UserQrScanExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell, WithStyles, WithColumnFormatting
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Obtener todos los registros de QrScan junto con las marcas
        return QrScan::with('marcas')->get();
    }

    /**
     * Definir los encabezados de las columnas.
     */
    public function headings(): array
    {
        // Encabezados fijos
        $headings = [
            'ID',
            'User ID',
            'Nombre',
            'Apellido',
            'Puesto',
            'Empresa',
            'Teléfono',
            'Rol en Expo',
            'Correo Electrónico',
            'Datos Adicionales',
            'Creado en',
            'Actualizado en',
        ];

        // Obtener todas las marcas y agregar columnas para cada marca
        $marcas = \App\Models\Marca::all();
        foreach ($marcas as $marca) {
            $headings[] = 'Marca: ' . $marca->nombre;
            $headings[] = 'Comentario: ' . $marca->nombre;
        }

        return $headings;
    }

    /**
     * Mapear los datos a las columnas.
     */
    public function map($qrScan): array
    {
        // Columnas fijas del usuario
        $row = [
            $qrScan->id,
            $qrScan->user_id,
            $qrScan->nombre,
            $qrScan->apellidos,
            $qrScan->puesto,
            $qrScan->empresa,
            $qrScan->telefono,
            $qrScan->rol,
            $qrScan->correo,
            $qrScan->campos_adicionales,
            Date::dateTimeToExcel($qrScan->created_at),
            Date::dateTimeToExcel($qrScan->updated_at),
        ];

        // Obtener las marcas seleccionadas por el usuario y agregarlas dinámicamente
        $marcas = \App\Models\Marca::all();
        $marcasSeleccionadas = $qrScan->marcas->pluck('pivot.comentarios', 'id')->toArray();

        foreach ($marcas as $marca) {
            if (array_key_exists($marca->id, $marcasSeleccionadas)) {
                // Si el usuario tiene esta marca seleccionada, se agrega la marca y el comentario
                $row[] = 'Sí'; // Marca seleccionada
                $row[] = $marcasSeleccionadas[$marca->id]; // Comentario de la marca
            } else {
                // Si no está seleccionada, se deja en blanco
                $row[] = 'No'; // Marca no seleccionada
                $row[] = '';    // Sin comentario
            }
        }

        return $row;
    }

    /**
     * Comenzar la exportación en la celda A2.
     */
    public function startCell(): string
    {
        return 'A2';
    }

    /**
     * Aplicar estilos a la hoja de cálculo.
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Aplicar negrita a la fila de encabezados
        ];
    }

    /**
     * Formatear columnas (por ejemplo, las fechas).
     */
    public function columnFormats(): array
    {
        return [
            'K' => 'dd/mm/yyyy', // Formato de fecha para la columna 'Creado en'
            'L' => 'dd/mm/yyyy', // Formato de fecha para la columna 'Actualizado en'
        ];
    }
}