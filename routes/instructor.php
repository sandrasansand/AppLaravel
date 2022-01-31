<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Instructor\CourseController;

Route::redirect('', 'instructor/courses');
// Route::get('courses', InstructorCourses::class)->middleware('can:Leer cursos')->name('courses.index');

Route::resource('courses', CourseController::class)->names('courses');