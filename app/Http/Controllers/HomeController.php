<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
   public function __invoke()
   {
   // return Course::find(1)->rating;
    $courses = Course ::where('status', '3')->latest('id')->get()->take(8);
   // return $courses;
   
    return view('welcome', compact('courses'));
   }
}
