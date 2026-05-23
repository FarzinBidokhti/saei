<?php

namespace App\Livewire;

use App\Models\Permission;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class PermissionTable extends PowerGridComponent
{
    public string $tableName = 'permissions';

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
        return Permission::query();
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
            ->add('created_at_converted', fn(Permission $permision) => Verta($permision->created_at)->format('Y/m/d'));
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

    public function actions(Permission $row): array
    {
        return [
            Button::add('edit')
                ->slot('ویرایش')
                ->class('btn gap-2 btn-sm btn-label-warning')
                ->route('permissions.edit', ['permission' => $row->id]),
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
