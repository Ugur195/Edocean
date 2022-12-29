<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Blogs;
use App\Models\Course;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Student;
use App\Models\SubjectCategory;
use App\Models\Subjects;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeGetController extends Controller
{

    //welcome
    public function welcome()
    {
        $name = 'Ugur';
        return view('welcome')->with('ad', $name);
    }
    //finish welcome


    //home
    public function home()
    {
        $course = Course::all();
        $teacher = Teacher::all();
        $menu = Menu::where('status', 1)->get();
        return view('frontend.index')->with(['course' => $course, 'teacher' => $teacher, 'menus' => $menu]);
    }
    //finish home


//    //ContactUs
//    public function GetContactUs()
//    {
//        $menu = Menu::where('status', 1)->get();
//        $setting = Setting::find(1);
//        return view('frontend.contact_us')->with(['menus' => $menu, 'setting' => $setting]);
//    }
//    //finish ContactUs


    //SignIn
    public function GetSignIn()
    {
        $menu = Menu::where('status', 1)->get();
        return view('frontend.sign_in')->with(['menus' => $menu]);
    }
    //finish SignIn


    //SignUp
    public function GetSignUp()
    {
        $menu = Menu::where('status', 1)->get();
        return view('frontend.sign_up')->with(['menus' => $menu]);
    }
    //finish SignUp


    //Logout
    public function GetLogout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    //finish Logout

    public function Blogs()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $blogs = Blogs::with('admin')->where('status', 1)->get();
        $blog_category = BlogCategory::all();
        return view('frontend.blogs')->with(['menus' => $menu, 'setting' => $setting, 'blogs' => $blogs,
            'blog_category' => $blog_category]);
    }

    public function BlogsCategory($category)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $blogs_category = BlogCategory::find($category);
        $blogs = Blogs::with('admin')->get();
        return view('frontend.teachers_category')->with(['menus' => $menu, 'setting' => $setting, 'blogs_category' => $blogs_category, 'blogs' => $blogs]);
    }

    public function SingleBlog($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $blogs_id = Blogs::find($id);
        $blogs = Blogs::with('admin')->get();
        $blog_category = BlogCategory::all();
        $about_us = AboutUs::all();
        $blogs_comments = BlogComment::where(['blog_id' => $blogs_id->id, 'status' => 1])->get();
        return view('frontend.single_blog')->with(['menus' => $menu, 'blogs' => $blogs, 'setting' => $setting,
            'blog_category' => $blog_category, 'about_us' => $about_us, 'blogs_id' => $blogs_id, 'blogs_comments' => $blogs_comments]);
    }


    public function Teachers()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $teachers = Teacher::with('subjects')->get();
        $categories = SubjectCategory::all();
        return view('frontend.teachers')->with(['menus' => $menu, 'setting' => $setting,
            'teacher' => $teachers, 'categories' => $categories]);
    }

    public function SingleTeacher($id)
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $teacher = Teacher::find($id);
        $categories = SubjectCategory::all();
        return view('frontend.single_teacher')->with(['menus' => $menu, 'setting' => $setting,
            'teacher' => $teacher, 'categories' => $categories]);
    }

    public function TeachersCategory($category)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $subjects_category = SubjectCategory::find($category);
        $category = Teacher::with('subjects')->get();
        $categories = SubjectCategory::all();
        return view('frontend.teachers_category')->with(['menus' => $menu, 'setting' => $setting, 'subjects_category' => $subjects_category, 'category' => $category, 'categories' => $categories]);
    }

    public function TeachersSubject($category)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $subjects_category = Subjects::find($category);
        $category = Teacher::with('subjects')->get();
        $categories = SubjectCategory::all();
        return view('frontend.teachers_category')->with(['menus' => $menu, 'setting' => $setting, 'subjects_category' => $subjects_category, 'category' => $category, 'categories' => $categories]);
    }

    public function Students()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $students = Student::with('subjects')->get();
        $subjects = SubjectCategory::all();
        return view('frontend.students')->with(['menus' => $menu, 'setting' => $setting, 'students' => $students, 'subjects' => $subjects]);
    }

    public function SingleStudent($id)
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $student = Student::find($id);
        $categories = SubjectCategory::all();
        return view('frontend.single_student')->with(['menus' => $menu, 'setting' => $setting,
            'student' => $student, 'categories' => $categories]);
    }

    public function Courses()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $courses = Course::with('subjects')->get();
        $subjects = SubjectCategory::all();
        return view('frontend.courses')->with(['menus' => $menu, 'setting' => $setting, 'courses' => $courses, "subjects" => $subjects]);
    }


}
