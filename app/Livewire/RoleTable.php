<?php

namespace App\Livewire;

use Verta;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class RoleTable extends PowerGridComponent
{
    public string $tableName = 'roles';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Role::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('created_at_converted', fn(Role $role) => Verta($role->created_at)->format('Y/m/d'));
    }

    public function columns(): array
    {
        return [
            Column::make('شناسه', 'id')
                ->sortable()
                ->searchable(),

            Column::make('عنوان', 'name')
                ->sortable()
                ->searchable(),

            Column::make('تاریخ ایجاد', 'created_at_converted', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('عملیات')

        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Role $row): array
    {
        return [
            Button::add('edit')
                ->slot('ویرایش')
                ->class('btn gap-2 btn-sm btn-label-warning')
                ->route('roles.edit', ['role' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
