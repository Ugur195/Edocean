<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class StudentGetController extends Controller
{
    public function Student()
    {
        return view('student.index_student');
    }

    public function StudentAttendance()
    {
        return view('student.student_attendance');
    }

    public function StudentSchedule()
    {
        return view('student.student_schedule');
    }

    public function StudentEdit($id)
    {
        $student = Student::all();
        $student_edit = Student::where('id', $id)->first();
        return view('student.student_edit')->with(['student_edit' => $student_edit, 'student' => $student]);
    }

    public function getStudent()
    {
        $student = DB::table('edocean.student')->select(DB::raw("id,image,name,surname,gender,email,phone,parent,payment,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($student)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64,".base64_encode($model->image)."'/>";
            })
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.student.student_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }
}
