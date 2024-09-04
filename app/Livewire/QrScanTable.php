<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\QrScan;

class QrScanTable extends DataTableComponent
{
    protected $model = QrScan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                // Cambia 'usuario_capturado' a 'usuarios_capturado'
                return route('admin.usuarios-capturados.edit', ['usuarios_capturado' => $row->id]);
            })
            ->setTableRowUrlTarget(function ($row) {
                return '_blank';
            });

        $this->setDefaultSort('id', 'desc');
        $this->setSingleSortingDisabled();
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
        $this->setPerPage(10);

        $this->setBulkActions([
            'deleteSelected' => 'Eliminar',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(fn($query, $searchTerm) => $query->orWhere('nombre', 'like', '%' . $searchTerm . '%')),
            Column::make("Apellidos", "apellidos")
                ->sortable()
                ->searchable(fn($query, $searchTerm) => $query->orWhere('apellidos', 'like', '%' . $searchTerm . '%')),
            Column::make("Puesto", "puesto")
                ->sortable()
                ->searchable(fn($query, $searchTerm) => $query->orWhere('puesto', 'like', '%' . $searchTerm . '%'))
                ->unclickable(),
            Column::make("Empresa", "empresa")
                ->sortable()
                ->searchable(fn($query, $searchTerm) => $query->orWhere('empresa', 'like', '%' . $searchTerm . '%'))
                ->unclickable(),
            Column::make("Telefono", "telefono")
                ->sortable(),
            Column::make("Rol", "rol")
                ->sortable(),
            Column::make("Correo", "correo")
                ->sortable(),
            Column::make("User id", "user.name")
                ->sortable(),
            Column::make("Fecha de Creación", "created_at")
                ->format(fn($value) => $value->format('d/m/Y'))
                ->sortable(),
        ];
    }

    public function deleteSelected()
    {
        if ($this->getSelected()) {
            QrScan::whereIn('id', $this->getSelected())->delete();
            $this->clearSelected();
        } else {
            $this->dispatch('error', 'No hay Usuarios Seleccionados');
        }
    }
}
