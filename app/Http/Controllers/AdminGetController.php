<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Setting;
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
        $setting = Setting::find(1);
        return view('backend.setting')->with(['setting' => $setting]);
    }

    public function AboutUs()
    {
        $about_us = AboutUs::find(1);
        return view('backend.about_us')->with(['about_us' => $about_us]);
    }


}
