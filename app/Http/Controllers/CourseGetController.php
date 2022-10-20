<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function MyCourse()
    {
        $course = Course::where('user_id', Auth::user()->id)->first();
        $user = null;
        if ($course == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $course;
        }
//        dd( explode(',',$course->language));
        return view('course.my_profile', ['course' => $user]);
    }
}
