<?php

namespace App\Http\Controllers\Access;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Permission\EditRequest;
use App\Http\Requests\Permission\CreateRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.access.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(('pages.access.permission.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $permission             = new Permission();
        $permission->name       = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->save();

        Alert::success('موفق', 'مجوز با موفقیت ثبت شد.');
        return redirect()->route('permissions.index');
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
    public function edit(Permission $permission)
    {
        return view('pages.access.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Permission $permission)
    {
        $permission->name = strtolower($request->name);
        $permission->save();

        Alert::success('موفقیت', 'مجوز با موفقیت ویرایش شد.');
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
