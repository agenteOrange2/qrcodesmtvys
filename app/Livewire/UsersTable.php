<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function ($row) {
            return route('users.edit', ['user' => $row->id]);
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
                ->sortable()
                ->unclickable(),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(fn($query, $searchTerm) => $query->orWhere('users.name', 'like', '%' . $searchTerm . '%')),            
            Column::make("Email", "email")
                ->sortable()
                ->collapseOnTablet()
                ->searchable(fn($query, $searchTerm) => $query->orWhere('users.email', 'like', '%' . $searchTerm . '%'))
                ->unclickable(),
            Column::make("Telefono", "phone")
                ->sortable()
                ->collapseOnTablet()
                ->unclickable(),
            Column::make("Created at", "created_at")
                ->format(fn($value) => $value->format('d/m/Y'))
                ->collapseOnTablet()
                ->sortable()
                ->unclickable(),
            Column::make("Updated at", "updated_at")
                ->format(fn($value) => $value->format('d/m/Y'))
                ->collapseOnTablet()
                ->sortable()
                ->unclickable(),
        ];
    }


    public function deleteSelected()
    {
        if ($this->getSelected()) {
            User::whereIn('id', $this->getSelected())->delete();
            $this->clearSelected();
        } else {
            $this->dispatch('error', 'No hay Usuarios Seleccionados');
        }
    }
}
