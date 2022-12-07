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


    // Course
    public function Courses()
    {
        return view('teacher.mycourses');
    }

    public function CourseInfo($id)
    {
        $teacher = TeacherCourse::find($id, 'course_id');
        $course = Course::find($teacher->course_id);
        return view('teacher.cInfo')->with(['course' => $course]);
    }

    public function getCourses(Request $request)
    {
        $teacher = DB::table('edocean.teacher_course')->select(DB::raw("edocean.course.name as course_name, edocean.teacher_course.id, edocean.teacher_course.created_at,  edocean.teacher_course.updated_at,
        edocean.teacher_course.status as st,
        (CASE  edocean.teacher_course.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.course', 'edocean.course.id', '=', 'edocean.teacher_course.course_id')
            ->where('edocean.teacher_course.user_id', $request->user_id)
            ->get();

        return DataTables::of($teacher)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary" href="' . route('admin.teacher_info', $model->id) . '" ><i style="font-size: 20px;" class="la la-info-circle"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" name="btn_delete" value="btn_delete" ><i style="font-size:21px;" class="la la-trash"></i></button>';
                return $return;

            })->rawColumns(['options' => true])->make(true);
    }

    // Student
    public function Students()
    {
        return view('teacher.mystudents');
    }

    public function getStudents(Request $request)
    {
        $teacher = DB::table('edocean.teacher_student')->select(DB::raw("edocean.student.name as student_name, edocean.course.name as course_name, edocean.teacher_student.id, edocean.teacher_student.created_at,  edocean.teacher_student.updated_at,
        edocean.teacher_student.status as st,
        (CASE  edocean.teacher_student.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.student', 'edocean.student.id', '=', 'edocean.teacher_student.student_id')
            ->leftJoin('edocean.course', 'edocean.course.id', '=', 'edocean.teacher_student.course_id')
            ->where('edocean.teacher_student.user_id', $request->user_id)
            ->get();

        return DataTables::of($teacher)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.student_info', $model->id) . '" ><i style="font-size: 20px;" class="la la-info-circle"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="buttonAccept(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1 "  name="button_accept"
                                        value="button_accept" ><i style="font-size:21px;" class="la la-check"></i></button>';
                }
                $return .= '<button onclick = "sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" name = "btn_delete" value = "btn_delete" ><i style = "font-size:21px;" class="la la-trash" ></i ></button > ';
                return $return;

            })->rawColumns(['options' => true])->make(true);
    }

    public function StudentInfo($id)
    {
        $teacher_c = TeacherStudent::find($id, 'course_id');
        $course = Course::find($teacher_c->course_id);
        $teacher_s = TeacherStudent::find($id, 'student_id');
        $student = Student::find($teacher_s->student_id);
        $data = DB::table('subject_category')->get();
        return view('teacher.sInfo')->with(['course' => $course, 'student' => $student, 'data' => $data]);
    }

}
