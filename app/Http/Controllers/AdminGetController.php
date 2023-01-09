<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Course;
use App\Models\CourseTeacher;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
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


//    //Admin
//
//
//    public function AdminsProject()
//    {
//        return view('backend.admins');
//    }
//
//    public function AdminsEditProject($id)
//    {
//        $admins_edit = Admin::where('user_id', $id)->first();
//        $userEdit = null;
//        if ($admins_edit == null) {
//            $userEdit = User::find($id);
//        } else {
//            $userEdit = $admins_edit;
//        }
//        return view('backend.admins_edit')->with(['admins_edit' => $userEdit]);
//    }
//
//    public function AddAdmin()
//    {
//        $add_admin = User::all();
//        return view('backend.add_admins')->with(['add_admin' => $add_admin]);
//    }
//
//
//    public function getAdminsProject()
//    {
//        $admins_project = DB::table('edocean.users')->select(DB::raw("edocean.users.id, edocean.admin.image,
//        edocean.users.name as first_name, edocean.admin.last_name,
//        edocean.admin.father_name, edocean.admin.birthday,
//        edocean.users.email, edocean.users.status as st,
//          (CASE edocean.users.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
//            ->where('edocean.users.author', 1)
//            ->leftJoin('edocean.admin', 'edocean.admin.user_id', '=', 'edocean.users.id')
//            ->get();
////        dd($admins_project);
//        return DataTables::of($admins_project)
//            ->editColumn('image', function ($model) {
//                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
//            })
//            ->addColumn('options', function ($model) {
//                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.admins_edit', $model->id) . '" ><i class="la la-user"></i></a>';
//                if ($model->st == 0) {
//                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
//                                        value="btn_blok" ><i class="la la-check"></i></button>';
//                } else if ($model->st == 1) {
//                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
//                }
//                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
//                return $return;
//            })->rawColumns(['options' => true])->make(true);
//    }
//    //finish Admin


    //Teacher
    public function Teacher()
    {
        return view('backend.teacher');
    }

    public function getTeacher()
    {
        $teacher = DB::table('edocean.teacher')->select(DB::raw("id,user_id,image,name,surname,gender,email,phone,subjects,lesson_price,balance,status as st,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();

        return DataTables::of($teacher)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mt-1" href="' . route('admin.backend.teacher_edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-success mt-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-dark mt-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mt-1" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
    }

    public function TeacherEdit($id)
    {
        $teacher_edit = Teacher::find($id);
        return view('backend.teacher_edit')->with(['teacher_edit' => $teacher_edit]);
    }
    //finish Teacher


    //Student
    public function Student()
    {
        return view('backend.student');
    }


    public function getStudent()
    {
        $student = DB::table('edocean.student')->select(DB::raw("id,user_id,image,name,surname,gender,email,phone,parent,payment,balance,status as st,
          (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($student)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.student_edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mt-1" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
    }



    public function StudentEdit($id)
    {
        $student_edit = Student::where('id', $id)->first();
        return view('backend.student_edit')->with(['student_edit' => $student_edit]);
    }
    //finish Student


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
