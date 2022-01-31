<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function enrolled(User $user, Course $course)
    {
        //verificar si un  usuario está matriculado
        return $course->students->contains($user->id);
    }
    public function published(?User $user, Course $course)
    { //protección ruta status 3
        if ($course->status == 3) {
            return true;
        } else {
            return false;
        }
    }
}
