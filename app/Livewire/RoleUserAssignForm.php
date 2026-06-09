<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

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

    public function render()
    {
        return view('livewire.role-user-assign-form');
    }
}
