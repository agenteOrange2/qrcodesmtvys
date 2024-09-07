<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\QrScan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class QrScanTable extends DataTableComponent
{
    protected $model = QrScan::class;

    // El método 'builder' es donde aplicamos los filtros, asegurando que retorne un Eloquent Builder.
    public function builder(): Builder
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Si el usuario es administrador (role_id = 1), ver todos los registros.
        // Si no, ver solo los registros que le pertenecen.
        if ($user->roles->contains('id', 1)) {
            // Usuario es administrador, ver todo.
            return QrScan::query()->with('user');
        } else {
            // Usuario no es administrador, ver solo sus propios escaneos.
            return QrScan::query()->where('user_id', $user->id)->with('user');
        }
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('admin.usuarios-capturados.edit', ['usuarios_capturado' => $row->id]);
            })
            ->setTableRowUrlTarget(function ($row) {
                return '_blank';
            })
            ->setDefaultSort('id', 'desc')
            ->setSingleSortingDisabled()
            ->setPerPageAccepted([10, 25, 50, 100, -1])
            ->setPerPage(10);

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
