<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;


class AdminPostController extends Controller
{

//    //Course
//    public function CoursesBlockUnblockDelete(Request $request)
//    {
//        try {
//            if ($request->btn_block != null) {
//                if ($request->status == 0) {
//                    User::where('id', $request->id)->update(['status' => 1]);
//                    Course::where('user_id', $request->id)->update(['status' => 1]);
//                    return response(['title' => 'Ugurlu!', 'message' => 'Course blokdan cixdi!', 'status' => 'success']);
//                } else if ($request->status == 1) {
//                    User::where('id', $request->id)->update(['status' => 0]);
//                    Course::where('user_id', $request->id)->update(['status' => 0]);
//                    return response(['title' => 'Ugurlu!', 'message' => 'Course bloklandi!', 'status' => 'success']);
//                } else {
//                    return response(['title' => 'Ugursuz!', 'message' => 'Coursu bloklamaq mumkun olmadi!', 'status' => 'error']);
//                }
//            } else if ($request->btn_delete != null) {
//                User::where('id', $request->id)->delete();
//                Course::where('user_id', $request->id)->delete();
//                return response(['title' => 'Ugurlu!', 'message' => 'Course ugurlu silindi!', 'status' => 'success']);
//            } else {
//                return response(['title' => 'Ugursuz!', 'message' => 'Coursu silmek mumkun olmadi!', 'status' => 'error']);
//            }
//        } catch (\Exception $exception) {
//            return response(['title' => 'Ugursuz!', 'message' => 'Coursu silmek olmur!', 'status' => 'error']);
//        }
//
//    }
//    //finish Course

}
