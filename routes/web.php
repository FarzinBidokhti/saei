<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginLogController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Access\RoleController;
use App\Http\Controllers\Defect\DefectController;
use App\Http\Controllers\Import\ImportController;
use App\Http\Controllers\Access\PermissionController;
use App\Http\Controllers\SubDefect\SubDefectController;
use App\Http\Controllers\Access\RoleUserAssignController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\DefectRequest\DefectRequestController;
use App\Http\Controllers\Access\RolePermissionAssignController;
use App\Http\Controllers\ApproveRequest\ApproveRequestController;

function permissionResource(string $uri, string $controller, string $permissionBase, array $withTrashed = []): void
{
    Route::resource($uri, $controller)->only(['index'])->middleware("permission:view {$permissionBase}");
    Route::resource($uri, $controller)->only(['create', 'store'])->middleware("permission:create {$permissionBase}");

    $editRoutes         = Route::resource($uri, $controller)->only(['edit', 'update'])->middleware("permission:edit {$permissionBase}");
    $editTrashedActions = array_intersect($withTrashed, ['edit', 'update']);

    if ($editTrashedActions !== []) {
        $editRoutes->withTrashed($editTrashedActions);
    }

    $destroyRoutes = Route::resource($uri, $controller)->only(['destroy'])->middleware("permission:delete {$permissionBase}");

    if (in_array('destroy', $withTrashed, true)) {
        $destroyRoutes->withTrashed(['destroy']);
    }

    $showRoutes = Route::resource($uri, $controller)->only(['show'])->middleware("permission:view {$permissionBase}");

    if (in_array('show', $withTrashed, true)) {
        $showRoutes->withTrashed(['show']);
    }
}

Route::redirect('/', '/login', 301);

Route::middleware(['auth', 'check.session'])->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->middleware('permission:view dashboard')->name('dashboard');

    Route::patch('users/{user}/restore', [UserController::class, 'restore'])
        ->withTrashed()
        ->middleware('permission:delete users')
        ->name('users.restore');

    permissionResource('users',           UserController::class, 'users', ['edit', 'show']);
    permissionResource('defects',         DefectController::class, 'defects');
    permissionResource('subdefects',      SubDefectController::class, 'subdefects');
    permissionResource('departments',     DepartmentController::class, 'departments');
    permissionResource('defectrequests',  DefectRequestController::class, 'defect requests');
    permissionResource('roles',           RoleController::class, 'roles');
    permissionResource('permissions',     PermissionController::class, 'permissions');
    permissionResource('approverequests', ApproveRequestController::class, 'approverequests');

    Route::resource('role-user-assign',       RoleUserAssignController::class)->middleware('permission:assign roles to users');
    Route::resource('role-permission-assign', RolePermissionAssignController::class)->middleware('permission:assign permissions to roles');

    Route::get('loginlog', [LoginLogController::class, 'index'])->middleware('permission:view login logs')->name('login-log');
    Route::get('import', [ImportController::class, 'importCsv'])->middleware('permission:import data');
});

require __DIR__ . '/auth.php';
