<?php

namespace App\Livewire;

use Verta;
use App\Models\User;
use App\Models\Section;
use App\Models\Department;
use App\Models\DefectRequest;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ApproveRequestTable extends PowerGridComponent
{
    public string $tableName = 'defectrequests';

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
        return $this->baseQuery()->with('user', 'defect', 'subdefect', 'section', 'approver');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('defect_request_id_formatted', function (DefectRequest $model) {
                return '<span class="badge badge-label-info fs-3">' .
                    'DR-' . $model->defect_request_id . '-' . substr($model->defect_request_id, strlen($model->defect_request_id) - 5, 5) .
                    '</span>';
            })
            ->add('user_full_name', function (DefectRequest $model) {
                return trim(($model->user?->first_name ?? '') . ' ' . ($model->user?->last_name ?? ''));
            })
            ->add('section_id', function (DefectRequest $model) {
                return $model->section?->title ?? '-';
            })
            ->add('defect_id', function (DefectRequest $model) {
                return $model->defect->title;
            })
            ->add('sub_defect_id', function (DefectRequest $model) {
                return $model->subdefect->title;
            })
            ->add('approved_by_name', function (DefectRequest $model) {
                if ($model->approver) {
                    return trim(($model->approver->first_name ?? '') . ' ' . ($model->approver->last_name ?? ''));
                }

                return '<span class="badge badge-label-warning fs-3">در انتظار بررسی</span>';
            })
            ->add('created_at_formatted', function (DefectRequest $model) {
                return verta($model->created_at)->format('H:i Y/m/d');
            });
    }

    public function columns(): array
    {
        return [
            Column::make('شناسه عیوب دستی', 'defect_request_id_formatted')
                ->sortable()
                ->searchable(),

            Column::make('کاربر', 'user_full_name', 'user_id')
                ->sortable()
                ->searchable(),

            Column::make('قسمت', 'section_id')
                ->sortable()
                ->searchable(),

            Column::make('عیب', 'defect_id')
                ->sortable()
                ->searchable(),

            Column::make('زیرعیب', 'sub_defect_id')
                ->sortable()
                ->searchable(),

            Column::make('تایید کننده', 'approved_by_name', 'approved_by')
                ->searchable(),

            Column::make('تاریخ ثبت', 'created_at_formatted', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('عملیات')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::select('user_id', 'user_id')
                ->dataSource(
                    User::query()
                        ->whereIn(
                            'id',
                            (clone $this->baseQuery())->select('user_id')->distinct()
                        )
                        ->get()
                        ->map(fn($user) => [
                            'id' => $user->id,
                            'name' => trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? '')),
                        ])
                )
                ->optionValue('id')
                ->optionLabel('name'),

            Filter::select('section_id', 'section_id')
                ->dataSource(
                    Section::query()
                        ->whereIn(
                            'id',
                            (clone $this->baseQuery())->select('section_id')->distinct()
                        )
                        ->get(['id', 'title'])
                )
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

    public function actions(DefectRequest $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="ki-duotone ki-notepad-edit fs-2"></i> بررسی عیب')
                ->class('btn btn-sm btn-primary fw-bold')
                ->dispatch('openApproveModal', ['requestId' => $row->id])
        ];
    }

    private function baseQuery(): Builder
    {
        $user = auth()->user();

        $query = DefectRequest::query()
            ->whereNotNull('reason_text')
            ->whereNull('approved_by');

        if (! $user->hasAnyRole(['owner', 'super admin'])) {
            $departmentIds = $user->departments()->pluck('departments.id');
            $query->whereIn('section_id', $departmentIds);
        }

        return $query;
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
