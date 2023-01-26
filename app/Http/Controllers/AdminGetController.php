<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminGetController extends Controller
{
    //HOME
    public function home()
    {
        return view('backend.index');
    }
    //finish Home


    //Course
    public function Course()
    {
        return view('backend.course');
    }

    public function getCourse()
    {
        $course = DB::table('edocean.course')->select(DB::raw("id,user_id,image,name,email,phone,subjects,lesson_cost,balance,status as st,
         (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($course)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.course_edit', $model->id) . '" ><i class="la la-info"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                return $return;

            })->rawColumns(['options' => true])->make(true);
    }


    public function CourseEdit($id)
    {
        $course_edit = Course::find($id);
        return view('backend.course_edit')->with(['course_edit' => $course_edit]);
    }
    //finish Course


}
