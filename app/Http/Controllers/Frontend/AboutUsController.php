<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Setting;

class AboutUsController extends Controller
{
    public function index()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        return view('frontend.about_us.index')->with(['menus' => $menu, 'setting' => $setting]);
    }
}
