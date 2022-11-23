<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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

    public function StudentCourse()
    {
        return view('student.student_course');
    }

    public function StudentCourseEdit($id)
    {
        $student_course = StudentCourse::find($id, 'course_id');
        $student_course_edit = Course::find($student_course->course_id);
        return view('student.student_course_edit')->with(['student_course_edit' => $student_course_edit]);
    }

    public function getStudentCourse(Request $request)
    {
        $student_course = DB::table('edocean.student_course')->select(DB::raw("edocean.course.name as course_name,
        edocean.teacher.name as teacher_name,
        edocean.student_course.id,edocean.student_course.course_id,edocean.student_course.teacher_id,edocean.student_course.created_at,
        edocean.student_course.updated_at,edocean.student_course.status as st,
          (CASE edocean.student_course.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.course', 'edocean.course.id', '=', 'edocean.student_course.course_id')
            ->leftJoin('edocean.teacher', 'edocean.teacher.id', '=', 'edocean.student_course.teacher_id')
            ->where('edocean.student_course.user_id', $request->user_id)
            ->get();
        return DataTables::of($student_course)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.student_course_edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
    }


    public function getMyProfile()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $data = DB::table('subject_category')->get();
        $user = null;
        if ($student == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $student;
        }
//        dd( explode(',',$student->language));
        return view('student.my_profile', ['student' => $user, 'data' => $data]);
    }

    public function GetSubCatStuEdit($id)
    {
        echo json_encode(DB::table('subjects')->where('subject_category_id', $id)->get());
    }


}
