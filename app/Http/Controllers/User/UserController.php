<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;

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

        $roles       = Role::all();
        $departments = Department::all();

        return view('pages.user.create', compact('departments', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        abort_unless(auth()->user()->can('create users'), 403);

        $data = $request->validated();

        $user = User::create([
            'username'   => $data['username'],
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'is_active'  => $data['is_active'],
        ]);

        $user->assignRole($data['role']);

        $departments = collect($request->input('departments', []))
            ->mapWithKeys(function ($departmentId) {
                return [
                    $departmentId => [
                        'created_by' => auth()->id(),
                    ]
                ];
            })
            ->toArray();

        $user->departments()->sync($departments);

        Alert::success('ثبت موفق', 'کاربر با موفقیت ایجاد شد.');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        abort_unless(auth()->user()->can('view users'), 403);

        $user->load('departments');

        $createdByUserIds = $user->departments
            ->pluck('pivot.created_by')
            ->filter()
            ->unique();

        $departmentCreators = User::query()
            ->whereIn('id', $createdByUserIds)
            ->get()
            ->keyBy('id');

        $loginLogs = $user->loginLogs()
            ->where(function ($query) {
                $query->where('login_at', '>=', now()->subDays(7))
                    ->orWhere('logout_at', '>=', now()->subDays(7));
            })
            ->latest('login_at')
            ->paginate(10, ['*'], 'logs_page');

        return view('pages.user.show', compact(['user', 'loginLogs', 'departmentCreators']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_unless(auth()->user()->can('edit users'), 403);

        $departments = Department::query()->get();
        $userDepartmentIds = $user->departments()
            ->pluck('departments.id')
            ->toArray();

        return view('pages.user.edit', compact('user', 'departments', 'userDepartmentIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        abort_unless(auth()->user()->can('edit users'), 403);

        $validated = $request->validated();

        $user->update([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'is_active'  => $validated['is_active'],
        ]);

        $syncData = collect($validated['departments'] ?? [])
            ->mapWithKeys(function ($departmentId) {
                return [
                    $departmentId => [
                        'created_by' => auth()->id(),
                    ],
                ];
            })
            ->toArray();

        $user->departments()->sync($syncData);

        return redirect()->route('users.edit', $user->id);
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
