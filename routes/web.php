<?php

use App\Support\RoleNames;
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

Route::middleware(['auth', 'check.session'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->middleware('permission:view dashboard')->name('dashboard');

    Route::resource('users',                  UserController::class);
    Route::resource('defects',                DefectController::class);
    Route::resource('subdefects',             SubDefectController::class);
    Route::resource('departments',            DepartmentController::class);
    Route::resource('defectrequests',         DefectRequestController::class);
    Route::resource('role-user-assign',       RoleUserAssignController::class);
    Route::resource('role-permission-assign', RolePermissionAssignController::class);

    Route::get('loginlog', [LoginLogController::class, 'index'])->name('login-log');
    Route::get('import',   [ImportController::class, 'importCsv']);

    // Route::middleware(['role:' . RoleNames::OWNER])->group(function () {
    Route::resource('roles',       RoleController::class);
    Route::resource('permissions', PermissionController::class);
    // });
});

require __DIR__ . '/auth.php';
