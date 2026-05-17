<?php

use LdapRecord\Container;
use Illuminate\Support\Facades\Route;
use LdapRecord\Models\ActiveDirectory\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Defect\DefectController;
use App\Http\Controllers\Import\ImportController;
use App\Http\Controllers\SubDefect\SubDefectController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\DefectRequest\DefectRequestController;

Route::get('/', function () {
    // return view('pages.dashboard');
});

Route::resource('users',          UserController::class);
Route::resource('defects',        DefectController::class);
Route::resource('subdefects',     SubDefectController::class);
Route::resource('departments',    DepartmentController::class);
Route::resource('defectrequests', DefectRequestController::class);

Route::get('import', [ImportController::class, 'importCsv']);

require __DIR__ . '/auth.php';
