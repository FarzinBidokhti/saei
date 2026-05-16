<?php

namespace App\Livewire;

use Verta;
use App\Models\User;
use App\Models\Defect;
use App\Models\Section;
use App\Models\SubDefect;
use App\Models\DefectRequest;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class DefectRequestTable extends PowerGridComponent
{
    public string $tableName = 'defectRequestTable';

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
        return DefectRequest::query()->with(['section', 'defect', 'subDefect', 'process']);
    }

    public function relationSearch(): array
    {
        return [
            'section'   => ['title'],
            'defect'    => ['title'],
            'subDefect' => ['title'],
            'process'   => ['reason'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add(
                'defect_request_id',
                fn(DefectRequest $defectRequest) => '<span class="badge badge-label-info fs-3">' . $defectRequest->defect_request_id . '</span>'
            )
            ->add('user_id')
            ->add('section_title',    fn($model) => $model->section?->title)
            ->add('defect_title',     fn($model) => $model->defect?->title)
            ->add('sub_defect_title', fn($model) => $model->subDefect?->title)
            ->add('process_reason',   fn($model) => $model->process?->reason)
            ->add(
                'created_at_converted',
                fn($model) => Verta($model->created_at)->format('Y/m/d')
            );
    }

    public function columns(): array
    {
        return [
            Column::make('شناسه درخواست عیب', 'defect_request_id')
                ->sortable()
                ->searchable(),

            Column::make('کاربر', 'user_id')
                ->sortable()
                ->searchable(),

            Column::make('بخش', 'section_title', 'section_id'),

            Column::make('عیب', 'defect_title', 'defect_id')
                ->sortable()
                ->searchable(),

            Column::make('زیر عیب', 'sub_defect_title', 'sub_defect_id')
                ->sortable()
                ->searchable(),

            Column::make('فرآیند', 'process_reason', 'process_id')
                ->sortable()
                ->searchable(),

            Column::make('تاریخ ایجاد', 'created_at_converted', 'created_at')
                ->sortable()
                ->searchable(),
        ];
    }

    public function filters(): array
    {
        $sections = Section::query()
            ->select('id', 'title')
            ->get();

        $defects = Defect::query()
            ->select('id', 'title')
            ->get();

        $subDefects = SubDefect::query()
            ->select('id', 'title')
            ->whereNotNull('title')
            ->get();

        $sectionOptions = $sections->map(function ($section) {
            return [
                'id'    => $section->id,
                'title' => $section->title,
            ];
        })->toArray();

        $defectOptions = $defects->map(function ($defect) {
            return [
                'id'    => $defect->id,
                'title' => $defect->title,
            ];
        })->toArray();

        $subDefectOptions = $subDefects->map(function ($subDefect) {
            return [
                'id'    => $subDefect->id,
                'title' => $subDefect->title,
            ];
        })->toArray();


        return [
            Filter::select('section_title', 'section_id')
                ->dataSource($sectionOptions)
                ->optionValue('id')
                ->optionLabel('title'),

            Filter::select('defect_title', 'defect_id')
                ->dataSource($defectOptions)
                ->optionValue('id')
                ->optionLabel('title'),

            Filter::select('sub_defect_title', 'sub_defect_id')
                ->dataSource($subDefectOptions)
                ->optionValue('id')
                ->optionLabel('title'),

            Filter::datepicker('created_at')
                ->builder(function (Builder $builder, array $date) {
                    if (!empty($date['start'])) {
                        $start = Verta::parse($date['start'])->datetime();
                        $builder->where('created_at', '>=', $start);
                    }

                    if (!empty($date['end'])) {
                        $end = Verta::parse($date['end'])->endDay()->datetime();
                        $builder->where('created_at', '<=', $end);
                    }
                }),
        ];
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
