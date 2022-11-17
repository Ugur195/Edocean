<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
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


    // Course
    public function Courses() {
        return view('teacher.mycourses');
    }

    public function getCourses()
    {
        $teacher = DB::table('edocean.teacher_course')->select(DB::raw("id,course_id,created_at,updated_at, status as st,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        // $courseName = Course::where('id', $teacher->course_id)->first();
        // if($courseName !== null) {
        //     $teacher->course_id=$courseName->name;
        // }

        return DataTables::of($teacher)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.teacher_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" name="btn_delete" value="btn_delete" ><i class="la la-trash"></i></button>';
                return $return;

            })->rawColumns(['options' => true])->make(true);
    }

    // Student
    public function getStudents() {
        return view('teacher.mystudents');
    }
}
