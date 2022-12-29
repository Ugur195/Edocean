<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login()
    {
        $menu = Menu::where('status', 1)->get();
        return view('frontend.authentication.login')->with(['menus' => $menu]);
    }

    public function register()
    {
        $menu = Menu::where('status', 1)->get();
        return view('frontend.authentication.register')->with(['menus' => $menu]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }


    //SignIn
    public function loginUser(Request $request)
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

    public function registerUser(Request $request)
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


}
