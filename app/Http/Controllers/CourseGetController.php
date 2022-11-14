<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $data = DB::table('subject_category')->get();
        $user = null;
        if ($course == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $course;
        }
//        dd( explode(',',$course->language));
        return view('course.my_profile', ['course' => $user, 'data' => $data]);
    }

    public function StudentRequests()
    {
        return view('course.student_requests');
    }

    public function TeacherRequests()
    {
        return view('course.teacher_requests');

    }


    public function GetSubCatEdit($id)
    {
        echo json_encode(DB::table('subjects')->where('subject_category_id', $id)->get());
    }
}
