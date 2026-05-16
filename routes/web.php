<?php

use Illuminate\Support\Facades\Route;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
