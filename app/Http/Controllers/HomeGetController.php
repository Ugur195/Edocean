<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Menu;
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
        $course = Course::all();
        $teacher = Teacher::all();
        $menu = Menu::where('status', 1);
        return view('frontend.index')->with(['course' => $course, 'teacher' => $teacher, 'menu' => $menu]);
    }
    //finish home


    //ContactUs
    public function GetContactUs()
    {
        return view('frontend.contact_us');
    }
    //finish ContactUs


    //SignIn
    public function GetSignIn()
    {
        return view('frontend.sign_in');
    }
    //finish SignIn


    //SignUp
    public function GetSignUp()
    {
        return view('frontend.sign_up');
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
