<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Instructor\CoursesStudents;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;


class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }
    public function show(Course $course)
    {
        $this->authorize('published', $course);

        $similares = Course::where('category_id', $course->category_id) //5 cursos similiares al curso show
            ->where('id', '!=', $course->id)
            ->where('status', 3)
            ->latest('id')
            ->take(5)
            ->get();


        return view('courses.show', compact('course', 'similares'));
    }
    public function enrolled(Course $course)
    {
        //add registro en course_user
        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }
//crear modelo course_user
    //crear metodo para mostrar cursos matriculados de 1 usuario registrado  course_user//crearlo bien
    public function miscursos(Course $course, User $user){
      //  $course_user = Course::all();
       $courses = Course::all('user_id', $user->user_id)
       ->where('status', 3)
       ->take(5);
      
        // $courses = Course::where('user_id', $course->user_id)
        //   ->where('status', 3)
        //     ->latest('id')
        //     ->paginate(8);
       
       
        return view('courses.miscursos', compact('courses'));
    }
}

// SELECT Cou.*, ima.url
// from courses Cou, course_user cuse, images ima
// where cou.user_id = cuse.user_id