<?php

namespace App\Http\Controllers\Access;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Requests\Access\RoleUserCreateRequest;

class RoleUserAssignController extends Controller
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
        $users = User::get();
        $roles = Role::get();

        return view('pages.access.role-assign.create', compact(['users', 'roles']));
    }

    /**
     *
     * Store a newly created resource in storage.
     */
    public function store(RoleUserCreateRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);

        $user->syncRoles([$role]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        toast('نقش با موفقیت اعمال شد.', 'success');
        return redirect()->route('role-user-assign.create');
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
