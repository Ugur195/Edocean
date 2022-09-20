<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeGetController extends Controller
{

    public function welcome()
    {
        $name = 'Ugur';
        return view('welcome')->with('ad', $name);
    }

    public function home()
    {
        return view('frontend.index');
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

    public function GetIndex()
    {
        return view('frontend.index');
    }


}
