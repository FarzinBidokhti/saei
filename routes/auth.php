<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LdapLoginController;

Route::middleware('guest')->group(function () {
    Route::get('login',  [LdapLoginController::class, 'create'])->name('login');
    Route::post('login', [LdapLoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LdapLoginController::class, 'destroy'])->name('logout');
});
