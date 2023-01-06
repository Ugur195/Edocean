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


    //home
    public function home()
    {
        $course = Course::all();
        $teacher = Teacher::all();
        $menu = Menu::where('status', 1)->get();
        return view('frontend.index')->with(['course' => $course, 'teacher' => $teacher, 'menus' => $menu]);
    }
    //finish home


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




    public function Teachers()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $teachers = Teacher::with('subjects')->get();
        $categories = SubjectCategory::all();
        return view('frontend.teachers')->with(['menus' => $menu, 'setting' => $setting,
            'teacher' => $teachers, 'categories' => $categories]);
    }

    public function SingleTeacher($id)
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $teacher = Teacher::find($id);
        $categories = SubjectCategory::all();
        return view('frontend.single_teacher')->with(['menus' => $menu, 'setting' => $setting,
            'teacher' => $teacher, 'categories' => $categories]);
    }

    public function TeachersCategory($category)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $subjects_category = SubjectCategory::find($category);
        $category = Teacher::with('subjects')->get();
        $categories = SubjectCategory::all();
        return view('frontend.teachers_category')->with(['menus' => $menu, 'setting' => $setting, 'subjects_category' => $subjects_category, 'category' => $category, 'categories' => $categories]);
    }

    public function TeachersSubject($category)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $subjects_category = Subjects::find($category);
        $category = Teacher::with('subjects')->get();
        $categories = SubjectCategory::all();
        return view('frontend.teachers_category')->with(['menus' => $menu, 'setting' => $setting, 'subjects_category' => $subjects_category, 'category' => $category, 'categories' => $categories]);
    }

    public function Students()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $students = Student::with('subjects')->get();
        $subjects = SubjectCategory::all();
        return view('frontend.students')->with(['menus' => $menu, 'setting' => $setting, 'students' => $students, 'subjects' => $subjects]);
    }

    public function SingleStudent($id)
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $student = Student::find($id);
        $categories = SubjectCategory::all();
        return view('frontend.single_student')->with(['menus' => $menu, 'setting' => $setting,
            'student' => $student, 'categories' => $categories]);
    }

    public function Courses()
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $courses = Course::with('subjects')->get();
        $subjects = SubjectCategory::all();
        return view('frontend.courses')->with(['menus' => $menu, 'setting' => $setting, 'courses' => $courses, "subjects" => $subjects]);
    }


}
