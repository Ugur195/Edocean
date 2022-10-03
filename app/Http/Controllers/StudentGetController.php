<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentGetController extends Controller
{
    public function Student()
    {
        return view('student.index');
    }

    public function StudentAttendance()
    {
        return view('student.student_attendance');
    }

    public function StudentSchedule()
    {
        return view('student.student_schedule');
    }
}
