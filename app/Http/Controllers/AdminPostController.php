<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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


    //Admin
    public function AdminsBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Admin::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Admin blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Admin::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Admin bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Admini bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Admin::where('user_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Admin ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Admini silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Admini silmek olmur!', 'status' => 'error']);
        }

    }


    public function AddAdmin(Request $request)
    {
        $add_admin = User::where('name', $request->name)->first();
        if ($add_admin == null) {
            $add_admin = new User();
            $add_admin->fin = $request->fin;
            $add_admin->name = $request->name;
            $add_admin->email = $request->email;
            $add_admin->password = Hash::make($request->password);
            $add_admin->author = 1;
            $add_admin->slug = $request->name;
            $add_admin->status = 1;
            $add_admin->save();
            return response(['title' => 'Ugurlu!', 'message' => 'Yeni Admin elave edildi!', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Yeni Admin elave etmek mumkun olmadi', 'status' => 'error']);
        }
    }


    public function AdminEdit(Request $request, $id)
    {
        $admin_edit = Admin::where('user_id', $id)->first();
        $userEdit = User::find($id);
        $image = null;
        if (isset($request->image)) {
            $image = file_get_contents($request->file('image')->getRealPath());
        }
        if ($admin_edit == null) {
            Admin::create([
                'image' => $image,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'father_name' => $request->father_name,
                'birthday' => $request->birthday,
                'email' => $request->email,
                'user_id' => $id,
                'password' => $userEdit->password,
                'status' => 1,
            ]);
        } else {
            $image = $admin_edit->image;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }
            $admin_edit->image = $image;
            $admin_edit->first_name = $request->first_name;
            $admin_edit->last_name = $request->last_name;
            $admin_edit->father_name = $request->father_name;
            $admin_edit->birthday = $request->birthday;
            $admin_edit->email = $request->email;
            $admin_edit->user_id = $id;
            $admin_edit->password = $userEdit->password;
            $admin_edit->status = 1;
            $admin_edit->save();
        }

        if ($request->first_name !== $userEdit->name) {
            $userEdit->name = $request->first_name;
            $userEdit->save();
        }
        return response(['title' => 'Ugurlu!', 'message' => 'Yeni Blog elave edildi!', 'status' => 'success']);
    }
    //finish Admin



    //BlogComment
    public function BlogCommentPublishUnpublishDelete(Request $request)
    {
        try {
            if ($request->btn_publish != null) {
                if ($request->status == 0) {
                    BlogComment::find($request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Reyiniz Yayimlandi', 'status' => 'success']);
                } else if ($request->status == 1) {
                    BlogComment::find($request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Reyiniz Saytda artiq yayinlanmir', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Blogsi bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                BlogComment::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'BlogComment Silindi', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'BlogCommenti silmek olmur!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'BlogsCommenti silmek olmur!', 'status' => 'error']);
        }
    }
    //finish BlogComment


}
