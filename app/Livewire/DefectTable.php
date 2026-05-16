<?php

namespace App\Livewire;

use App\Models\Defect;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class DefectTable extends PowerGridComponent
{
    public string $tableName = 'defects';

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
        return Defect::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('code')
            ->add('title')
            ->add(
                'is_show',
                fn(Defect $defect) => $defect->is_show
                    ? '<span class="badge badge-label-success py-2" style="position: inherit">قابل نمایش</span>'
                    : '<span class="badge badge-label-danger py-2" style="position: inherit">غیرقابل نمایش</span>'
            )
            ->add(
                'created_at_converted',
                fn(Defect $defect) => Verta($defect->created_at)->format('Y/m/d')
            );
    }

    public function columns(): array
    {
        return [
            Column::make('شناسه عیب', 'code')
                ->sortable()
                ->searchable(),
            Column::make('عنوان عیب', 'title')
                ->sortable()
                ->searchable(),
            Column::make('وضعیت نمایش', 'is_show'),
            Column::make('تاریخ ایجاد', 'created_at_converted'),
            Column::action('عملیات')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(Defect $row): array
    {
        return [
            Button::add('show')
                ->slot('مشاهده')
                ->class('btn gap-2 btn-label-primary')
                ->route('defects.show', ['defect' => $row->id]),

            Button::add('edit')
                ->slot('ویرایش')
                ->class('btn gap-2 btn-label-warning')
                ->route('defects.edit', ['defect' => $row->id])
        ];
    }
}
