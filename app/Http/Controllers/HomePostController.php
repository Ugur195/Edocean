<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
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
    public function PostContactUs(Request $request)
    {
        try {

            $validate = Validator::make($request->all(), [
                'full_name' => 'required|string',
                'email' => 'required|email|unique:contact_us,email',
                'subject' => 'required|string',
                'message' => 'required|string'
            ]);


            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Melumat gondermek mumkun olmadi', 'status' => 'validation-error',
                    'errors' => $validate->errors()]);
            }
            $contact_us = new ContactUs();
            $contact_us->full_name = $request->full_name;
            $contact_us->subject = $request->subject;
            $contact_us->email = $request->email;
            $contact_us->message = $request->message;
            $contact_us->read_unread = 0;
            $contact_us->status = 1;
            $contact_us->save();
            return response(['title' => 'Ugurlu!', 'message' => 'Mesajiniz gonderildi,tezlikle elaqe saxliyaciyiq!', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesajiniz gonderilmedi!', 'status' => 'error']);
        }

    }


    public function PostSignUp(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'fin' => 'required|string|min:7|unique:users,fin',
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
            $user->status = 0;
            $user->save();

            try {
              Mail::send('emails.mesaj_gonder', ['msg' => 'Answer: ' . '<a href="aa.com">Qeydiyyatdan ugurlu kecdiz</a>'], function ($message) use ($request) {
                    $message->to($request->email, $request->name)->subject('Mail linki');
                    $message->from('edocean_course@mail.ru', 'Edocean Course');
                    $message->setBody('<a href="/aaaaa.com">salam</a>', 'text/html');
                });
            } catch (\Exception $exception) {
                DB::rollBack();
                return response(['title' => 'Ugursuz!', 'message' => 'Mail xetasi! Bele email movcud deyil!', 'status' => 'error']);
            }
            DB::commit();
            return response(['title' => 'Ugurlu!', 'message' => 'Qeydiyyatdan ugurlu kecdiz', 'status' => 'success']);

        } catch (\Exception $exception) {
            DB::rollBack();
            return response(['title' => 'Ugursuz!', 'message' => 'Qeydiyyatdan kecmek mumkun olmadi' . $exception->getMessage(), 'status' => 'error']);
        }

    }

    public function PostSignIn()
    {
        return redirect('/index');
    }
}
