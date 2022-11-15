<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return auth()->user()->userType();
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


}
