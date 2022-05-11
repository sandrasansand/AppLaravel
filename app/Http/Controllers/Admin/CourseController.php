<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se puede publicar un curso sin estar completo');
        }
        $course->status = 3;
        $course->save();

        //se envia email
        $mail = new ApprovedCourse($course);
        Mail::to($course->teachers->email)->queue($mail); //send()

        return redirect()->route('admin.courses.index')->with('info', 'El curso se ha publicado correctamente.');
    }
    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));
    }
    public function reject(Request $request, Course $course){
       //validación del cuerpo del form
        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all());
        
        $course->status = 1;
        $course->save();

         //se envia email
         $mail = new RejectCourse($course);
         Mail::to($course->teachers->email)->queue($mail); //send()
         return redirect()->route('admin.courses.index')->with('info', 'El curso se ha sido rechazado por parte del Administrador.');
       
    }
}
