<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use Symfony\Component\Routing\Route as RoutingRoute;

use App\Http\Livewire\CourseStatus;

use App\Http\Livewire\CourseMiscursos;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('/cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('/course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

// Route::get('/course-miscursos{course}', [CourseMiscursos::class])->name('courses.miscursos')->middleware('auth');

Route::get('/course-miscursos',[CourseController::class, 'miscursos'])->name('courses.miscursos')->middleware('auth');

// Route::get('contact', [CourseController::class, 'index' ])->name('contact.index');
