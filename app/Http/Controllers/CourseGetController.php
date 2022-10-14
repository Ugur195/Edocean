<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseGetController extends Controller
{
    public function Course()
    {
        return view('course.index');
    }

    public function CourseSchedule()
    {
        return view('course.course_schedule');
    }
}
