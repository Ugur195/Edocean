<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;


class AdminPostController extends Controller
{
    //Student
    public function StudentsBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Student::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Student::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Studenti bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Student::where('user_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Student ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Studenti silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Studenti silmek olmur!', 'status' => 'error']);
        }

    }
    //finish Student


    //Teacher
    public function TeachersBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Teacher::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Teacher blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Teacher::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Teacher bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Teacheri bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Teacher::where('user_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Teacher ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Teacheri silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Teacheri silmek olmur!', 'status' => 'error']);
        }
    }
    //finish Teacher


    //Course
    public function CoursesBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Course::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Course blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Course::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Course bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Coursu bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Course::where('user_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Course ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Coursu silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Coursu silmek olmur!', 'status' => 'error']);
        }

    }
    //finish Course

}
