<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class HomePostController extends Controller
{
    public function PostContactUs(Request $request)
    {
        try {
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
        try {
            $request->validate([
                'fin' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:6',
            ]);


            $user = new User();
            $user->fin = $request->fin;
            $user->author = $request->radio;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->slug = Str::slug($request->name);
            $user->status = 0;
            $user->save();



            Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . '<a href="aa.com">Qeydiyyatdan ugurlu kecdiz</a>'], function ($message) use ($request) {
                $message->to($request->email, $request->name)->subject('Mail linki');
                $message->from('edocean_course@mail.ru', 'Edocean Course');
                $message->setBody('<a href="/aaaaa.com">salam</a>', 'text/html');
            });
            return response(['title' => 'Ugurlu!', 'message' => 'Qeydiyyatdan ugurlu kecdiz', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Qeydiyyatdan kecmek mumkun olmadi', 'status' => 'error']);
        }

    }

    public function PostSignIn()
    {
        return redirect('/index');
    }
}
