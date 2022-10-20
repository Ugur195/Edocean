<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherGetController extends Controller
{
    public function Teacher()
    {
        return view('teacher.index');
    }

    public function TeacherSchedule()
    {
        return view('teacher.teacher_schedule');
    }

    public function getTeacherProfile()
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $user = null;
        if ($teacher == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $teacher;
        }
//        dd( explode(',',$teacher->language));
        return view('teacher.my_profile', ['teacher' => $user]);
    }
}
