<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use App\Models\ContactUs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class HomePostController extends Controller
{
    //ContactUs
//    public function PostContactUs(Request $request)
//    {
//        try {
//
//            $validate = Validator::make($request->all(), [
//                'full_name' => 'required|string',
//                'email' => 'required|email|unique:contact_us,email',
//                'subject' => 'required|string',
//                'message' => 'required|string'
//            ]);
//
//
//            if ($validate->fails()) {
//                return response(['title' => 'Ugursuz!', 'message' => 'Melumat gondermek mumkun olmadi', 'status' => 'validation-error',
//                    'errors' => $validate->errors()]);
//            }
//            $contact_us = new ContactUs();
//            $contact_us->full_name = $request->full_name;
//            $contact_us->subject = $request->subject;
//            $contact_us->email = $request->email;
//            $contact_us->message = $request->message;
//            $contact_us->read_unread = 0;
//            $contact_us->status = 1;
//            $contact_us->save();
//            return response(['title' => 'Ugurlu!', 'message' => 'Mesajiniz gonderildi,tezlikle elaqe saxliyaciyiq!', 'status' => 'success']);
//
//        } catch (\Exception $exception) {
//            return response(['title' => 'Ugursuz!', 'message' => 'Mesajiniz gonderilmedi!', 'status' => 'error']);
//        }
//
//    }
    //finish ContactUs


    //SignUp
    public function PostSignUp(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'fin' => 'required|string|min:7|max:7|unique:users,fin',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'author' => 'required|numeric'
        ]);


        if ($validate->fails()) {
            return response(['title' => 'Ugursuz!', 'message' => 'Melumat gondermek mumkun olmadi', 'status' => 'validation-error',
                'errors' => $validate->errors()]);
        }

        try {
            DB::beginTransaction();
            $user = new User();
            $user->fin = $request->fin;
            $user->author = $request->author;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->slug = Str::slug($request->name);
            $user->status = 1;
            $user->save();

            DB::commit();
            return response(['title' => 'Ugurlu!', 'message' => 'Qeydiyyatdan ugurlu kecdiz', 'status' => 'success']);

        } catch (\Exception $exception) {
            DB::rollBack();
            return response(['title' => 'Ugursuz!', 'message' => 'Qeydiyyatdan kecmek mumkun olmadi' . $exception->getMessage(), 'status' => 'error']);
        }

    }
    //finish SignUp


    //SignIn
    public function PostSignIn(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'fin' => 'required|string|min:7|max:7',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return response(['title' => 'Ugursuz!', 'message' => 'Melumat gondermek mumkun olmadi', 'status' => 'validation-error',
                'errors' => $validate->errors()]);
        }

        $login = $request->only('fin', 'email', 'password');
        if (Auth::attempt($login)) {
            return response(['title' => 'Ugurlu!', 'message' => 'Melumat gondermek mumkun olmadi', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Daxil olmaq mumkun olmadi, sifre yalniwdir!', 'status' => 'error']);
        }
    }
    //finish SignIn


    //Blogs
    public function SingleBlog(Request $request, $id)
    {

        try {
            $blogs_comments = new BlogComment();
            if (Auth::check()) {
                $blogs_comments->name = Auth::user()->name;
                $blogs_comments->email = Auth::user()->email;
                $blogs_comments->user_id = Auth::user()->id;
            } else {
                $blogs_comments->name = $request->name;
                $blogs_comments->email = $request->email;
                $blogs_comments->user_id = 0;
            }

            if ($request->parent_id != null) {
                $blogs_comments->parent_id = $request->parent_id;
            } else {
                $blogs_comments->parent_id = 0;
            }

            $blogs_comments->message = $request->comment;
            $blogs_comments->blog_id = $id;
            $blogs_comments->status = 0;
            $blogs_comments->save();

            return response(['title' => 'Ugurlu', 'message' => 'Reyiniz gonderildi,admin terefinden tesdiqlikden sonra yayinlanacaq!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Reyiniz gonderilmedi!', 'status' => 'error']);
        }
    }
    // finish Blogs

}
