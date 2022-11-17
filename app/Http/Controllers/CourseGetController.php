<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Teacher;
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

    public function CourseStudentEdit($id)
    {
        $course_students_edit = Student::find($id);
        return view('course.course_students_edit')->with(['course_student_edit' => $course_students_edit]);
    }

    public function getCourseStudentRequests(Request $request)
    {
        $course_student = DB::table('edocean.course_student')->select(DB::raw("edocean.student.name as student_name,edocean.teacher.name as teacher_name,
        edocean.course_student.id,edocean.course_student.student_id,edocean.course_student.teacher_id,edocean.course_student.created_at,
        edocean.course_student.updated_at,edocean.course_student.status as st,
          (CASE edocean.course_student.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.student', 'edocean.student.id', '=', 'edocean.course_student.student_id')
            ->leftJoin('edocean.teacher', 'edocean.teacher.id', '=', 'edocean.course_student.teacher_id')
            ->where('edocean.course_student.user_id', $request->user_id)
            ->get();
        return DataTables::of($course_student)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.course.course_students_edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="buttonAccept(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1 "  name="button_accept"
                                        value="button_accept" ><i class="la la-check"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" name="btn_delete" value="btn_delete" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);

    }

    public function CourseTeacherRequests()
    {
        return view('course.course_teachers');

    }

    public function CourseTeacherEdit($id)
    {
        $course_teachers_edit = Teacher::find($id);
        return view('course.course_teachers_edit')->with(['course_teachers_edit' => $course_teachers_edit]);
    }


    public function getCourseTeacherRequests()
    {
        $course_teacher = DB::table('edocean.course_teacher')->select(DB::raw("id,teacher_id,student_id,created_at,updated_at,status as st,
          (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($course_teacher)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.course.course_teachers_edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="buttonAccept(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1 "  name="button_accept"
                                        value="button_accept" ><i class="la la-check"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" name="btn_delete" value="btn_delete" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);

    }


    public function GetSubCatEdit($id)
    {
        echo json_encode(DB::table('subjects')->where('subject_category_id', $id)->get());
    }
}
