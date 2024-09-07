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
        // Obtener todos los registros de la tabla QrScan
        return QrScan::all();
    }

    /**
     * Definir los encabezados de las columnas.
     */
    public function headings(): array
    {
        return [
            
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
    }

    /**
     * Mapear los datos a las columnas.
     */
    public function map($qrScan): array
    {
        return [
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
            Date::dateTimeToExcel($qrScan->created_at), // Formato Excel para la fecha
            Date::dateTimeToExcel($qrScan->updated_at),
        ];
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
