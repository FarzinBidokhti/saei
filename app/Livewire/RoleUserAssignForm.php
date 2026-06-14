<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleUserAssignForm extends Component
{
    public $users        = [];
    public $roles        = [];
    public $user_id      = null;
    public $selectedUser = null;
    public $role_id      = null;
    public $currentRole  = null;

    public function mount()
    {
        abort_unless(auth()->user()->can('assign roles to users'), 403);

        $this->users = User::get();
        $this->roles = Role::get();
    }

    public function updatedUserId($value)
    {
        if (!$value) {
            $this->selectedUser = null;
            return;
        }

        $this->selectedUser = User::find($value);
        $this->currentRole  = $this->selectedUser?->roles?->pluck('name')->first();
    }

    public function save()
    {
        abort_unless(auth()->user()->can('assign roles to users'), 403);

        $this->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ], [
            'user_id.required' => 'انتخاب کاربر الزامی است.',
            'user_id.exists'   => 'کاربر انتخاب‌ شده معتبر نیست.',
            'role_id.required' => 'انتخاب نقش الزامی است.',
            'role_id.exists'   => 'نقش انتخاب‌شده معتبر نیست.',
        ]);

        $user = User::findOrFail($this->user_id);
        $role = Role::findOrFail($this->role_id);

        $user->syncRoles([$role]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        session()->flash('success', 'تخصیص نقش به کاربر با موفقیت انجام شد.');
    }

    public function render()
    {
        return view('livewire.role-user-assign-form');
    }
}
