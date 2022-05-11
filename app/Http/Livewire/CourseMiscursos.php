<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\User;


use Livewire\WithPagination;

class CourseMiscursos extends Component

{
    use WithPagination;
    public $course;
    public $user;

    public function mount(Course $course, User $user, $course_user)
    {
        $this->course = $course;
        $this->user = $user;
        $this->course_user = $course_user;
    }
    public function render()
    {
    
        $user = User::all()->where('user_id', auth()->user()->id->get());
        $course = Course::all()->where('user_id', auth()->user()->id->get()); //->get()
        return view('livewire.course-miscursos', compact('course', 'user'));
    }
}
