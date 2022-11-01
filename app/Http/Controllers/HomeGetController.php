<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeGetController extends Controller
{

    public function welcome()
    {
        $name = 'Ugur';
        return view('welcome')->with('ad', $name);
    }

    public function home()
    {
        $course = Course::all();
        $teacher = Teacher::all();
        return view('frontend.index')->with(['course' => $course, 'teacher' => $teacher]);
    }


    public function GetContactUs()
    {
        return view('frontend.contact_us');
    }

    public function GetSignIn()
    {
        return view('frontend.sign_in');
    }

    public function GetSignUp()
    {
        return view('frontend.sign_up');
    }


    public function GetLogout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }


}
