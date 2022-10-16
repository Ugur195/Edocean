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
        $langs = '';
        if (isset($request->langs)) {
            foreach ($request->langs as $l) {
                $langs .= ',' . $l;
            }
        }


        if ($student == null) {
            Student::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'father_name' => $request->father_name,
                'birthday' => $request->birthday,
                'user_id' => Auth::user()->id,
                'language' => $langs,
                'gender' => $request->gender,
                'education_level' => $request->education_level,
                'teacher_gender' => $request->teacher_gender,
                'parent' => $request->parent,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'skype_id' => $request->skype_id,
                'student_mission' => $request->student_mission,
                'payment' => $request->payment,
                'balance' => $request->balance,
            ]);
        } else {
            $student->name = $request->name;
            $student->surname = $request->surname;
            $student->father_name = $request->father_name;
            $student->birthday = $request->birthday;
            $student->language = $langs;
            $student->gender = $request->gender;
            $student->education_level = $request->education_level;
            $student->teacher_gender = $request->teacher_gender;
            $student->parent = $request->parent;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->phone = $request->phone;
            $student->skype_id = $request->skype_id;
            $student->student_mission = $request->student_mission;
            $student->payment = $request->payment;
            $student->balance = $request->balance;
            $student->save();
        }
        return back();
    }
}
