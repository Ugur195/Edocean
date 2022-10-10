<?php

namespace App\Http\Controllers;

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

    public function getStudent()
    {
        $student = DB::table('edocean.student')->select(DB::raw("id,image,name,surname,gender,email,phone,parent,payment,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Oxunub' END) as status"))->get();
        return DataTables::of($student)
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="/admin/student/index_student/' . $model->id . '" ><i class="la la-reply"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }
}
