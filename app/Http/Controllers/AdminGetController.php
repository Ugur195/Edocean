<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Admin;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Blogs;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\CourseTeacher;
use App\Models\Menu;
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
    //HOME
    public function home()
    {
        return view('backend.index');
    }
    //finish Home


    //Setting
    public function Setting()
    {
        $setting = Setting::find(1);
        return view('backend.setting')->with(['setting' => $setting]);
    }
    //finish Setting


    //AboutUs
    public function AboutUs()
    {
        $about_us = AboutUs::find(1);
        return view('backend.about_us')->with(['about_us' => $about_us]);
    }
    //finish AboutUs


    //ContactUs/Messages
    public function ContactUs()
    {
        return view('backend.contact_us');
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

    public function MessagesEdit($id)
    {
        $contact_us = ContactUs::all();
        $messages_edit = ContactUs::where('id', $id)->first();
        if ($messages_edit->read_unread == 0) {
            ContactUs::where('id', $id)->update(['read_unread' => 1]);
        }
        return view('backend.messages_edit')->with(['contact_us' => $contact_us, 'messages_edit' => $messages_edit]);
    }
    //finish ContactUs/Messages


    //Admin
    public function Admins()
    {
        return view('backend.admins');
    }

    public function AdminsProject()
    {
        return view('backend.admins');
    }

    public function AdminsEditProject($id)
    {
        $admins_edit = Admin::where('user_id', $id)->first();
        $userEdit = null;
        if ($admins_edit == null) {
            $userEdit = User::find($id);
        } else {
            $userEdit = $admins_edit;
        }
        return view('backend.admins_edit')->with(['admins_edit' => $userEdit]);
    }

    public function AddAdmin()
    {
        $add_admin = User::all();
        return view('backend.add_admins')->with(['add_admin' => $add_admin]);
    }


    public function getAdminsProject()
    {
        $admins_project = DB::table('edocean.users')->select(DB::raw("edocean.users.id, edocean.admin.image,
        edocean.users.name as first_name, edocean.admin.last_name,
        edocean.admin.father_name, edocean.admin.birthday,
        edocean.users.email, edocean.users.status as st,
          (CASE edocean.users.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->where('edocean.users.author', 1)
            ->leftJoin('edocean.admin', 'edocean.admin.user_id', '=', 'edocean.users.id')
            ->get();
//        dd($admins_project);
        return DataTables::of($admins_project)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.admins_edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
    }
    //finish Admin


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
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.teacher_edit', $model->id) . '" ><i class="la la-user"></i></a>';
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
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.course_edit', $model->id) . '" ><i class="la la-user"></i></a>';
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


    //Blogs
    public function getBlogs()
    {
//        dd(User::find(55));
        $blogs = DB::table('edocean.blogs')->select(DB::raw("edocean.users.name as username, edocean.blog_category.name as bg_name,
         edocean.blogs.id, edocean.blogs.image,edocean.blogs.title,
        edocean.blogs.message,edocean.blogs.author,edocean.blogs.category_id,edocean.blogs.likes,edocean.blogs.dislike,edocean.blogs.see_count,
         edocean.blogs.status as st,
        (CASE edocean.blogs.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.users', 'edocean.users.id', '=', 'edocean.blogs.author')
            ->leftJoin('edocean.blog_category', 'edocean.blog_category.id', '=', 'edocean.blogs.category_id')
            ->get();
//        dd($blogs);
        return DataTables::of($blogs)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.blogs_edit', $model->id) . '" ><i class="la la-info"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
    }

    public function BlogsEdit($id)
    {
        $blog_category = BlogCategory::all();
        $blogs_edit = Blogs::where('id', $id)->first();
        return view('backend.blogs_edit')->with(['blogs_edit' => $blogs_edit, 'blog_category' => $blog_category]);
    }

    public function Blogs()
    {
        return view('backend.blogs');
    }

    public function AddBlogs()
    {
        $blogs = Blogs::all();
        $blog_category = BlogCategory::where('status', 1)->get();
        return view('backend.blogs_add')->with(['blog_category' => $blog_category, 'blogs' => $blogs]);
    }
    //finish Blogs


    //Blog Category
    public function getBlogCategory()
    {
        $blog_category = DB::table('edocean.blog_category')->select(DB::raw("id, name, slug,created_at,updated_at,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($blog_category)
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.blog_category_edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }

    public function AddBlogCategory()
    {
        return view('backend.add_blog_category');
    }


    public function BlogCategoryEdit($id)
    {
        $blog_category_edit = BlogCategory::where('id', $id)->first();
        return view('backend.blog_category_edit')->with(['blog_category_edit' => $blog_category_edit]);
    }


    public function BlogCategory()
    {
        return view('backend.blog_category');
    }
    //finish Blog Category


    //BlogComment
    public function getBlogComment()
    {
        $blog_comment = DB::table('edocean.blog_comment')->select(DB::raw("edocean.blogs.title as title_name,
        edocean.blog_comment.id, edocean.blog_comment.name,
		edocean.blog_comment.email, edocean.blog_comment.message, edocean.blog_comment.blog_id,
		 edocean.blog_comment.parent_id,edocean.blog_comment.status as st,
        (CASE edocean.blog_comment.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.blogs', 'edocean.blogs.id', '=', 'edocean.blog_comment.blog_id')
            ->get();
        return DataTables::of($blog_comment)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.backend.blog_comment_edit', $model->id) . '" ><i class="la la-info"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="publishUnpublish(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_publish"
                                        value="btn_publish" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button onclick="publishUnpublish(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unpublish"  value="btn_unpublish" ><i class="la la-close"></i></button>';
                }
                $return .= '<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
    }

    public function BlogCommentEdit($id)
    {
        $blog_comment_edit = BlogComment::where('id', $id)->first();
        return view('backend.blog_comment_edit')->with(['blog_comment_edit' => $blog_comment_edit]);
    }

    public function BlogComment()
    {
        return view('backend.blog_comment');
    }
    //finish BlogComment


    //Menu
    public function Menu()
    {
        return view('backend.menu');
    }

    public function getMenu()
    {
        $menu = DB::table('edocean.menu')->select(DB::raw("id, name, page, slug,created_at,updated_at,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($menu)
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.backend.menu_edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
			    	<button onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }

    public function AddMenu()
    {
        return view('backend.add_menu');
    }

    public function MenuEdit($id)
    {
        $menu_edit = Menu::find($id);
        return view('backend.menu_edit')->with(['menu_edit' => $menu_edit]);
    }
    //finish Menu

}
