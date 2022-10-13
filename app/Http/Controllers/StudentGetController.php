<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function getMyProfile()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $user = null;
        if ($student == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $student;
        }
        return view('student.my_profile', ['student' => $user]);
    }
    public function postMyProfile(Request $request)
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        if($student==null){
            Student::create([
                'name'=>$request->name,
            ]);
        }else{
            $student->name=$request->name;
            $student->save();
        }
        return response();
    }

}
