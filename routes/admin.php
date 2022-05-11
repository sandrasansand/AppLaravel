<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', RoleController::class)->names('roles'); //resource crea las 7 rutas para crud
Route::resource('users', UserController::class)->names('users');

Route::resource('categories',CategoryController::class)->names('categories');

Route::resource('levels',LevelController::class)->names('levels');

Route::resource('prices',PriceController::class)->names('prices');

route::get('courses', [CourseController::class, 'index'])->name(('courses.index'));


route::get('courses/{course}', [CourseController::class, 'show'])->name(('courses.show'));

route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name(('courses.approved'));

route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name(('courses.observation'));
route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name(('courses.reject'));
