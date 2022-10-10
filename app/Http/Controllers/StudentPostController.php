<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentPostController extends Controller
{
    public function StudentsDelete(Request $request)
    {
        try {
            Student::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Student Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Student silmek olmur!', 'status' => 'error']);
        }
    }
}
