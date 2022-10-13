<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentPostController extends Controller
{
    public function postMyProfile(Request $request)
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $langs='';
        if(isset($request->langs)){
            foreach ($request->langs as $l){
                $langs.=','.$l;
            }
        }
        if($student==null){
            Student::create([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'user_id'=>Auth::user()->id,
                'language'=>$langs,
                'gender'=>$request->gender,
            ]);
        }else{
            $student->name=$request->name;
            $student->surname=$request->surname;
            $student->language=$langs;
            $student->gender=$request->gender;
            $student->save();
        }
        return back();
    }
}
