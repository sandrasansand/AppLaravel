<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', RoleController::class)->names('roles'); //resource crea las 7 rutas para crud
Route::resource('users', UserController::class)->names('users');