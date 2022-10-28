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
            $image = null;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }
            Student::create([
                'image' => $image,
                'name' => $request->name,
                'surname' => $request->surname,
                'father_name' => $request->father_name,
                'birthday' => $request->birthday,
                'user_id' => Auth::user()->id,
                'language' => $langs,
                'gender' => $request->gender,
                'education_level' => $request->education_level,
                'lesson_duration' => $request->lesson_duration,
                'lessons_intensivity' => $request->lessons_intensivity,
                'students_amount' => $request->students_amount,
                'teacher_gender' => $request->teacher_gender,
                'teacher_status' => $request->teacher_status,
                'country' => $request->country,
                'city' => $request->city,
                'parent' => $request->parent,
                'subjects' => $request->subjects,
                'subjects_category' => $request->subjects_category,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'skype_id' => $request->skype_id,
                'student_mission' => $request->student_mission,
                'payment' => $request->payment,
                'balance' => $request->balance,

            ]);
        } else {
            $image = $student->image;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }
            $student->image = $image;
            $student->name = $request->name;
            $student->surname = $request->surname;
            $student->father_name = $request->father_name;
            $student->birthday = $request->birthday;
            $student->language = $langs;
            $student->gender = $request->gender;
            $student->education_level = $request->education_level;
            $student->lesson_duration = $request->lesson_duration;
            $student->lessons_intensivity = $request->lessons_intensivity;
            $student->students_amount = $request->students_amount;
            $student->teacher_gender = $request->teacher_gender;
            $student->teacher_status = $request->teacher_status;
            $student->parent = $request->parent;
            $student->subjects = $request->subjects;
            $student->subjects_category = $request->subjects_category;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->phone = $request->phone;
            $student->country = $request->country;
            $student->city = $request->city;
            $student->skype_id = $request->skype_id;
            $student->student_mission = $request->student_mission;
            $student->payment = $request->payment;
            $student->balance = $request->balance;
            $student->save();
        }
        return back();
    }
}
