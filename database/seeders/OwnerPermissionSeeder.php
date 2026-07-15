<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class OwnerPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $ownerRole = Role::firstOrCreate([
            'name'       => 'owner',
            'guard_name' => 'web',
        ]);

        $permissions = Permission::where('guard_name', 'web')->get();

        $ownerRole->syncPermissions($permissions);

        $user = User::find(1);

        if (! $user) {
            $this->command?->warn('User with ID 1 was not found.');
            return;
        }

        $user->assignRole($ownerRole);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $this->command?->info('All permissions assigned to owner role and owner role assigned to user ID 1.');
    }
}
