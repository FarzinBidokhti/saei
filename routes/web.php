<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginLogController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Access\RoleController;
use App\Http\Controllers\Defect\DefectController;
use App\Http\Controllers\Import\ImportController;
use App\Http\Controllers\Auth\LdapLoginController;
use App\Http\Controllers\Access\PermissionController;
use App\Http\Controllers\SubDefect\SubDefectController;
use App\Http\Controllers\Access\RoleUserAssignController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\DefectRequest\DefectRequestController;
use App\Http\Controllers\Access\RolePermissionAssignController;

function permissionResource($uri, $controller, $permissionBase)
{
    Route::resource($uri, $controller)->only(['index'])->middleware("permission:view {$permissionBase}");
    Route::resource($uri, $controller)->only(['create', 'store'])->middleware("permission:create {$permissionBase}");
    Route::resource($uri, $controller)->only(['edit', 'update'])->middleware("permission:edit {$permissionBase}");
    Route::resource($uri, $controller)->only(['destroy'])->middleware("permission:delete {$permissionBase}");
    Route::resource($uri, $controller)->only(['show'])->middleware("permission:view {$permissionBase}");
}

Route::middleware(['auth', 'check.session'])->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->middleware('permission:view dashboard')->name('dashboard');

    permissionResource('users',          UserController::class, 'users');
    permissionResource('defects',        DefectController::class, 'defects');
    permissionResource('subdefects',     SubDefectController::class, 'subdefects');
    permissionResource('departments',    DepartmentController::class, 'departments');
    permissionResource('defectrequests', DefectRequestController::class, 'defect requests');
    // =-=-=-=-=
    permissionResource('roles',          RoleController::class, 'roles');
    permissionResource('permissions',    PermissionController::class, 'permissions');
    // =-=-=-=-=

    Route::resource('role-user-assign',       RoleUserAssignController::class)->middleware('permission:assign roles to users');
    Route::resource('role-permission-assign', RolePermissionAssignController::class)->middleware('permission:assign permissions to roles');

    Route::get('loginlog', [LoginLogController::class, 'index'])->middleware('permission:view login logs')->name('login-log');
    Route::get('import', [ImportController::class, 'importCsv'])->middleware('permission:import data');
});

require __DIR__ . '/auth.php';
