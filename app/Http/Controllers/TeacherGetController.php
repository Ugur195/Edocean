<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\TeacherStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
        $data = DB::table('subject_category')->get();
        $user = null;
        if ($teacher == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $teacher;
        }
//        dd( explode(',',$teacher->language));
        return view('teacher.my_profile', ['teacher' => $user, 'data' => $data]);
    }

    public function GetSubCatTeachEdit($id)
    {
        echo json_encode(DB::table('subjects')->where('subject_category_id', $id)->get());
    }

}
