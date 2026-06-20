<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

final class UserTable extends PowerGridComponent
{
    public string $tableName = 'users';

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
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('first_name')
            ->add('last_name')
            ->add('username')
            ->add(
                'is_active_label',
                fn(User $u) => $u->is_active
                    ? '<span class="badge badge-label-success py-2" style="position: inherit">فعال</span>'
                    : '<span class="badge badge-label-danger py-2" style="position: inherit">غیرفعال</span>'
            )
            ->add('created_at_convert', fn(User $user) => verta($user->created_at)->format('Y/m/d'));
    }

    public function columns(): array
    {
        return [
            Column::make('شناسه', 'id')->sortable()->searchable(),
            Column::make('نام', 'first_name')->sortable()->searchable(),
            Column::make('نام خانوادگی', 'last_name')->sortable()->searchable(),
            Column::make('نام کاربری', 'username')->sortable()->searchable(),
            Column::make('فعال/غیرفعال', 'is_active_label')
                ->contentClassField('is_active_class'),
            Column::make('تاریخ ثبت نام', 'created_at_convert')->sortable()->searchable(),
            Column::action('عملیات'),
        ];
    }

    public function actions(User $row): array
    {
        return [
            Button::add('show')
                ->slot('نمایش')
                ->class('btn btn-sm btn-primary me-1')
                ->route('users.show', ['user' => $row->id]),

            Button::add('edit')
                ->slot('ویرایش')
                ->class('btn btn-sm btn-warning')
                ->route('users.edit', ['user' => $row->id]),
        ];
    }

    public function filters(): array
    {
        return [];
    }
}
