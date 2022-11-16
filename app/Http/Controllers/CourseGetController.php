<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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

    public function CourseStudentRequests()
    {
        return view('course.course_students');
    }

    public function getCourseStudentRequests()
    {
        $course_student = DB::table('edocean.course_student')->select(DB::raw("id,student_id,teacher_id,created_at,updated_at,status as st,
          (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($course_student)
            ->addColumn('options', function ($model) {
                $return= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" name="btn_delete" value="btn_delete" ><i class="la la-trash"></i></button>';
                if ($model->st == 0) {
                    $return .= '<button onclick="buttonAccept(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mt-1 "  name="button_accept"
                                        value="button_accept" ><i class="la la-check"></i></button>';
                }
                return $return;
            })->rawColumns(['options' => true])->make(true);

    }

    public function CourseTeacherRequests()
    {
        return view('course.course_teacher');

    }


    public function GetSubCatEdit($id)
    {
        echo json_encode(DB::table('subjects')->where('subject_category_id', $id)->get());
    }
}
