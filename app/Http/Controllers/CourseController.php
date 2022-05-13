<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Instructor\CoursesStudents;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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
// select cour.* 
//from course_user c , users u, courses cour  
// where c.user_id = u.id 
// and cour.id = c.course_id
// and u.id=1;
    // metodo para mostrar cursos matriculados de 1 usuario registrado  
    public function miscursos(Course $course, User $user)
    {
       
        $coursesUser = DB::table('course_user')
            ->Join('users', 'users.id', '=', 'course_user.user_id')
            ->Join('courses', 'courses.id', '=', 'course_user.course_id')
            ->where('users.id', '=', auth()->user()->id)
            ->select('courses.*')
            ->get();

        return view('courses.miscursos', compact('coursesUser'));
    }
}


// // 