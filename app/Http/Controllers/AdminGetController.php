<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AdminGetController extends Controller
{
    public function home()
    {
        return view('backend.index');
    }

    public function ContactUs()
    {
        return view('backend.contact_us');
    }

    public function Setting()
    {
        $setting = Setting::find(1);
        return view('backend.setting')->with(['setting' => $setting]);
    }

    public function AboutUs()
    {
        $about_us = AboutUs::find(1);
        return view('backend.about_us')->with(['about_us' => $about_us]);
    }

    public function MessagesEdit($id)
    {
        $contact_us = ContactUs::all();
        $messages_edit = ContactUs::where('id', $id)->first();
        if ($messages_edit->read_unread == 0) {
            ContactUs::where('id', $id)->update(['read_unread' => 1]);
        }
        return view('backend.messages_edit')->with(['contact_us' => $contact_us, 'messages_edit' => $messages_edit]);
    }


    public function getContactUs()
    {
        $contact_us = DB::table('edocean.contact_us')->select(DB::raw("id, full_name, subject, message, email,
        (CASE read_unread WHEN  0 then 'Oxunmayib' WHEN 1 then 'Oxunub' END) as read_unread,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($contact_us)
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.messages_edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }

    public function Teacher()
    {
        return view('backend.teacher');
    }

    public function getTeacher()
    {
        $teacher = DB::table('edocean.teacher')->select(DB::raw("id,image,name,surname,gender,email,phone,subjects,lesson_price,balance,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($teacher)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.teacher_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }

    public function TeacherEdit($id)
    {
        $teacher = Teacher::all();
        $teacher_edit = Teacher::where('id', $id)->first();
        return view('backend.teacher_edit')->with(['teacher_edit' => $teacher_edit, 'teacher' => $teacher]);
    }

    public function Student()
    {
        return view('backend.student');
    }


    public function getStudent()
    {
        $student = DB::table('edocean.student')->select(DB::raw("id,image,name,surname,gender,email,phone,parent,payment,balance,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($student)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.student_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }


    public function StudentEdit($id)
    {
        $student = Student::all();
        $student_edit = Student::where('id', $id)->first();
        return view('backend.student_edit')->with(['student_edit' => $student_edit, 'student' => $student]);
    }

    public function Course()
    {
        return view('backend.course');
    }

    public function getCourse()
    {
        $course = DB::table('edocean.course')->select(DB::raw("id,image,name,email,phone,subjects,lesson_cost,balance,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($course)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.course_edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);

    }

    public function CourseEdit($id)
    {
        $course = Course::all();
        $course_edit = Course::where('id', $id)->first();
        return view('backend.course_edit')->with(['course' => $course, 'course_edit' => $course_edit]);
    }

}
