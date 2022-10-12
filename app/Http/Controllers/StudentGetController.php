<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class StudentGetController extends Controller
{
    public function StudentAttendance()
    {
        return view('student.student_attendance');
    }

    public function StudentSchedule()
    {
        return view('student.student_schedule');
    }

}
