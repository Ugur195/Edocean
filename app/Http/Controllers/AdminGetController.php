<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('backend.setting');
    }


}
