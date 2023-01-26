<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Student;
use App\Models\SubjectCategory;
use App\Models\Subjects;
use App\Models\Teacher;


class HomeGetController extends Controller
{

    //welcome
    public function welcome()
    {
        $name = 'Ugur';
        return view('welcome')->with('ad', $name);
    }
    //finish welcome



    //Blog

//    public function BlogsCategory($category)
//    {
//        $setting = Setting::find(1);
//        $menu = Menu::where('status', 1)->get();
//        $blogs_category = BlogCategory::find($category);
//        $blogs = Blogs::with('admin')->get();
//        return view('frontend.teachers_category')->with(['menus' => $menu, 'setting' => $setting, 'blogs_category' => $blogs_category, 'blogs' => $blogs]);
//    }
    //finishBlog


    public function Courses()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $courses = Course::with('subjects')->get();
        $subjects = SubjectCategory::all();
        return view('frontend.courses')->with(['menus' => $menu, 'setting' => $setting, 'courses' => $courses, "subjects" => $subjects]);
    }


}
