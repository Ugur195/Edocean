<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Admin;
use App\Models\Blogs;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
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

    public function Admins()
    {
        return view('backend.admins');
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
        $teacher = DB::table('edocean.teacher')->select(DB::raw("id,image,name,surname,gender,email,phone,subjects,lesson_price,balance,status as st,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($teacher)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.teacher_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mt-1 "  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mt-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                return $return;

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
        $student = DB::table('edocean.student')->select(DB::raw("id,image,name,surname,gender,email,phone,parent,payment,balance,status as st,
          (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($student)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.student_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mt-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mt-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                return $return;

            })->rawColumns(['options' => true])->make(true);
    }


    public function StudentEdit($id)
    {
        $student = Student::all();
        $student_edit = Student::where('id', $id)->first();
        return view('backend.student_edit')->with(['student_edit' => $student_edit, 'student' => $student]);
    }


    public function AdminsProject()
    {
        return view('backend.admins');
    }


    public function getAdminsProject()
    {
        $admins_project = DB::table('edocean.admin')->select(DB::raw("id,image,first_name,last_name,father_name,birthday,email,status as st,
          (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($admins_project)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.admins_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                return $return;

            })->rawColumns(['options' => true])->make(true);
    }

    public function AdminsEditProject($id)
    {
        $admins = Admin::all();
        $admins_edit = Admin::where('id', $id)->first();
        return view('backend.admins_edit')->with(['admins' => $admins, 'admins_edit' => $admins_edit]);
    }

    public function Course()
    {
        return view('backend.course');
    }

    public function getCourse()
    {
        $course = DB::table('edocean.course')->select(DB::raw("id,image,name,email,phone,subjects,lesson_cost,balance,status as st,
         (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($course)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.course_edit', $model->id) . '" ><i class="la la-user"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                return $return;

            })->rawColumns(['options' => true])->make(true);
    }


    public function CourseEdit($id)
    {
        $course = Course::all();
        $course_edit = Course::where('id', $id)->first();
        return view('backend.course_edit')->with(['course' => $course, 'course_edit' => $course_edit]);
    }


    public function getBlogs()
    {
//        dd(User::find(55));
        $blogs = DB::table('edocean.blogs')->select(DB::raw("edocean.users.name as username, edocean.blog_category.name as bg_name,
         edocean.blogs.id, edocean.blogs.image,edocean.blogs.title,
        edocean.blogs.message,edocean.blogs.author,edocean.blogs.category,edocean.blogs.likes,edocean.blogs.dislike,edocean.blogs.see_count,
        (CASE edocean.blogs.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.users', 'edocean.users.id', '=', 'edocean.blogs.author')
            ->leftJoin('edocean.blog_category', 'edocean.blog_category.id', '=', 'edocean.blogs.category')
            ->get();
//        dd($blogs);
        return DataTables::of($blogs)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.blogs_edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }

    public function BlogsEdit($id)
    {
        $blogs = Blogs::all();
        $blogs_edit = Blogs::where('id', $id)->first();
        return view('backend.blogs_edit')->with(['blogs' => $blogs, 'blogs_edit' => $blogs_edit]);
    }

    public function Blogs()
    {
        return view('backend.blogs');
    }

    public function BlogsComment()
    {
        return view('backend.blog_comment');
    }

    public function BlogsCategory()
    {
        return view('backend.blog_category');
    }

}
