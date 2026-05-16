<?php

namespace App\Livewire;

use Verta;
use App\Models\SubDefect;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class SubDefectTable extends PowerGridComponent
{
    public string $tableName = 'sub_defects';

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
        return SubDefect::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('defect_id')
            ->add('code')
            ->add('title')
            ->add(
                'is_show',
                fn(SubDefect $subDefect) => $subDefect->is_show ?
                    '<span class="badge badge-label-success py-2" style="position: inherit">قابل نمایش</span>' :
                    '<span class="badge badge-label-danger py-2" style="position: inherit">غیرقابل نمایش</span>'
            )
            ->add(
                'created_at_converted',
                fn(SubDefect $subDefect) => Verta($subDefect->created_at)->format('Y/m/d')
            );
    }

    public function columns(): array
    {
        return [
            Column::make('شناسه', 'id')
                ->sortable()
                ->searchable(),

            Column::make('عیب', 'defect_id')
                ->sortable()
                ->searchable(),

            Column::make('کد زیر عیب', 'code')
                ->sortable()
                ->searchable(),

            Column::make('عنوان زیر عیب', 'title')
                ->sortable()
                ->searchable(),

            Column::make('وضعیت نمایش', 'is_show')
                ->sortable()
                ->searchable(),

            Column::make('تاریخ ایجاد', 'created_at_converted')
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
