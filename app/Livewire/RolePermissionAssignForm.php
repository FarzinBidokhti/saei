<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionAssignForm extends Component
{
    public ?int $role_id = null;

    public array $selectedPermissions = [];

    public $roles = [];
    public $permissions = [];

    public function mount(): void
    {
        abort_unless(auth()->user()->can('assign permissions to roles'), 403);

        $this->roles = Role::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $this->permissions = Permission::query()
            ->select('id', 'name', 'label')
            ->orderBy('id')
            ->get();
    }

    public function updatedRoleId($value): void
    {
        if (!$value) {
            $this->selectedPermissions = [];
            return;
        }

        $role = Role::find($value);

        if (!$role) {
            $this->selectedPermissions = [];
            return;
        }

        $this->selectedPermissions = $role->permissions()
            ->pluck('permissions.id')
            ->map(fn($id) => (string) $id)
            ->toArray();
    }

    public function selectAll(): void
    {
        $this->selectedPermissions = collect($this->permissions)
            ->pluck('id')
            ->map(fn($id) => (string) $id)
            ->toArray();
    }

    public function deselectAll(): void
    {
        $this->selectedPermissions = [];
    }

    public function save()
    {
        abort_unless(auth()->user()->can('assign permissions to roles'), 403);

        $this->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'selectedPermissions' => ['nullable', 'array'],
            'selectedPermissions.*' => ['exists:permissions,id'],
        ]);

        $role = Role::findOrFail($this->role_id);

        $permissions = Permission::query()
            ->whereIn('id', $this->selectedPermissions)
            ->where('guard_name', $role->guard_name)
            ->get();

        $role->syncPermissions($permissions);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        session()->flash('success', 'مجوزها با موفقیت به نقش اختصاص داده شدند.');
    }

    public function render()
    {
        return view('livewire.role-permission-assign-form');
    }
}
