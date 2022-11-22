<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\BlogCategory;
use App\Models\Blogs;
use App\Models\Course;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Student;
use App\Models\SubjectCategory;
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
        return view('frontend.index')->with(['course' => $course, 'teacher' => $teacher, 'menu' => $menu]);
    }
    //finish home


    //ContactUs
    public function GetContactUs()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        return view('frontend.contact_us')->with(['menu' => $menu, 'setting' => $setting]);
    }
    //finish ContactUs


    //SignIn
    public function GetSignIn()
    {
        $menu = Menu::where('status', 1)->get();
        return view('frontend.sign_in')->with(['menu' => $menu]);
    }
    //finish SignIn


    //SignUp
    public function GetSignUp()
    {
        $menu = Menu::where('status', 1)->get();
        return view('frontend.sign_up')->with(['menu' => $menu]);
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
        $blogs = Blogs::with('admin')->get();
        $blog_category = BlogCategory::all();
        return view('frontend.blogs')->with(['menu' => $menu, 'setting' => $setting, 'blogs' => $blogs,
            'blog_category' => $blog_category]);
    }

    public function SingleBlog($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $blogs = Blogs::find($id);
        $blog_category = BlogCategory::all();
        $about_us = AboutUs::all();
        return view('frontend.single_blog')->with(['menu' => $menu, 'blogs' => $blogs, 'setting' => $setting,
            'blog_category' => $blog_category, 'about_us' => $about_us]);
    }


    public function Teachers()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $teachers = Teacher::with('subjects')->get();
        $teachers_course = TeacherCourse::all();
        return view('frontend.teachers')->with(['menu' => $menu, 'setting' => $setting, 'teacher' => $teachers, 'teachers_course' => $teachers_course]);
    }


}
