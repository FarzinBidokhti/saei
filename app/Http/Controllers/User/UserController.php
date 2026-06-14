<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\User\CreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(auth()->user()->can('view users'), 403);

        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(auth()->user()->can('create users'), 403);

        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        abort_unless(auth()->user()->can('create users'), 403);

        $user             = new User();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->username   = $request->username;
        $user->password   = $request->password;
        $user->work_at    = $request->work_at;
        $user->save();

        Alert::success('موفق', 'کاربر با موفقیت ثبت شد');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort_unless(auth()->user()->can('view users'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_unless(auth()->user()->can('edit users'), 403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort_unless(auth()->user()->can('edit users'), 403);

        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'username'   => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'work_at'    => ['nullable', 'string', 'max:255'],
            'password'   => ['nullable', 'string', 'min:6'],
        ]);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->username   = $request->username;
        $user->work_at    = $request->work_at;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Alert::success('موفق', 'کاربر با موفقیت ویرایش شد');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_unless(auth()->user()->can('delete users'), 403);

        $user = User::findOrFail($id);
        $user->delete();

        Alert::success('موفق', 'کاربر با موفقیت حذف شد');

        return redirect()->route('users.index');
    }
}
