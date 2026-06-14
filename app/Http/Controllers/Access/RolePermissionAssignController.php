<?php

namespace App\Http\Controllers\Access;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(auth()->user()->can('assign permissions to roles'), 403);

        return view('pages.access.permission-assign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_unless(auth()->user()->can('assign permissions to roles'), 403);

        $request->validate([
            'role_id'       => ['required', 'exists:roles,id'],
            'permissions'   => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ]);

        $role = Role::findOrFail($request->role_id);

        $permissions = Permission::whereIn('id', $request->permissions ?? [])->get();

        $role->syncPermissions($permissions);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        toast('مجوزها با موفقیت به نقش اختصاص داده شدند.', 'success');

        return redirect()->route('role-permission-assign.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
