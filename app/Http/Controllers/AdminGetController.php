<?php

namespace App\Http\Controllers;

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


}
