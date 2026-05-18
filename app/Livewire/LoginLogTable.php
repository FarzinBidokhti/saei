<?php

namespace App\Livewire;

use App\Models\LoginLog;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class LoginLogTable extends PowerGridComponent
{
    public string $tableName = 'login_logs';

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
        return LoginLog::query()->with(['user']);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('user_id', fn($model) => $model->user?->fisrt_name . $model->user?->last_name)
            ->add('username')
            ->add('session_id')
            ->add(
                'ip_address',
                fn(LoginLog $loginLog) => '<span class="badge badge-label-info fs-3">' . $loginLog->ip_address . '</span>'
            )
            ->add('device_type')
            ->add('browser')
            ->add('os')
            ->add('login_at_converted', fn($model) => Verta($model->login_at)->format('Y/m/d H:i'))
            ->add('logout_at_converted', fn($model) => Verta($model->logout_at)->format('Y/m/d H:i'))
            ->add(
                'status',
                fn(LoginLog $loginLog) => $loginLog->status ?
                    '<span class="badge badge-label-success py-2" style="position: inherit">موفق</span>' :
                    '<span class="badge badge-label-danger py-2" style="position: inherit">ناموفق</span>'
            )
            ->add('description')
            ->add(
                'created_at_converted',
                fn($model) => Verta($model->created_at)->format('Y/m/d')
            );
    }

    public function columns(): array
    {
        return [
            Column::make('کاربر', 'user_id')
                ->sortable()
                ->searchable(),

            Column::make('نام کاربری', 'username')
                ->sortable()
                ->searchable(),

            Column::make('شناسه جلسه', 'session_id')
                ->sortable()
                ->searchable(),

            Column::make('نوع دستگاه', 'device_type')
                ->sortable()
                ->searchable(),

            Column::make('مرورگر', 'browser')
                ->sortable()
                ->searchable(),

            Column::make('سیستم عامل', 'os')
                ->sortable()
                ->searchable(),

            Column::make('آدرس آی پی', 'ip_address')
                ->sortable()
                ->searchable(),

            Column::make('ورود', 'login_at_converted')
                ->sortable()
                ->searchable(),

            Column::make('خروج', 'logout_at_converted')
                ->sortable()
                ->searchable(),

            Column::make('وضعیت', 'status')
                ->sortable()
                ->searchable(),

            Column::make('توضیحات', 'description')
                ->sortable()
                ->searchable(),

            Column::make('تاریخ ایجاد', 'created_at_converted')
                ->sortable()
                ->searchable(),
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
