<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
