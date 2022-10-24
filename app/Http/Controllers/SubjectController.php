<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index() {
        $course = Course::all();
        $data = DB::table('subject_category')->get();
        return view('course.my_profile')->with('data', $data, 'course', $course);
    }

    public function GetSubCatEdit($id) {
        echo json_encode(DB::table('subjects')->where('subject_category_id', $id)->get());
    }

}
