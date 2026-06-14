<?php

namespace App\Http\Controllers\Access;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\EditRequest;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(auth()->user()->can('view roles'), 403);

        return view('pages.access.role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(auth()->user()->can('create roles'), 403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_unless(auth()->user()->can('create roles'), 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort_unless(auth()->user()->can('view roles'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        abort_unless(auth()->user()->can('edit roles'), 403);

        return view('pages.access.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Role $role)
    {
        abort_unless(auth()->user()->can('edit roles'), 403);

        $role->name = strtolower($request->name);
        $role->save();

        Alert::success('موفقیت', 'نقش با موفقیت ویرایش شد.');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_unless(auth()->user()->can('delete roles'), 403);
    }
}
