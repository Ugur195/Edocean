<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $teacher = Teacher::where('user_id', Auth::id())->first();
        return view('account.teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        $teacher = Teacher::where('user_id', Auth::id())->first();
        return view('account.teacher.create',compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit():View
//    {
//        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
//        $data = DB::table('subject_category')->get();
//        $user = null;
//        if ($teacher == null) {
//            $user = User::find(Auth::user()->id);
//        } else {
//            $user = $teacher;
//        }
////        dd( explode(',',$teacher->language));
//        return view('account.teacher.edit', ['teacher' => $user, 'data' => $data]);
//    }
    public function edit():View
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $data = DB::table('subject_category')->get();
        $user = null;
        if ($teacher == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $teacher;
        }
//        dd( explode(',',$teacher->language));
        return view('account.teacher.edit2', ['teacher' => $user, 'data' => $data]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $user=User::find(Auth::user()->id);
        $langs = '';

        if (isset($request->langs)) {
            foreach ($request->langs as $l) {
                $langs .= ',' . $l;
            }
        }
//
//        if ($teacher == null) {
//            $image = null;
//            if (isset($request->image)) {
//                $image = file_get_contents($request->file('image')->getRealPath());
//            }
//
//
//            Teacher::create([
//                'image' => $image,
//                'father_name' => $request->father_name,
//                'teacher_address' => $request->teacher_address,
//                'birthday' => $request->birthday,
//                'user_id' => Auth::user()->id,
//                'language' => $langs,
//                'gender' => $request->gender,
//                'lessons_duration' => $request->lessons_duration,
//                'lessons_intensivity' => $request->lessons_intensivity,
//                'student_level' => $request->student_level,
//                'students_amount' => $request->students_amount,
//                'profile_type' => $request->profile_type,
//                'country' => $request->country,
//                'city' => $request->city,
//                'subjects' => $request->subjects,
//                'subjects_category' => $request->subjects_category,
//                'teaching_time' => $request->teaching_time,
//                'demo_lesson' => $request->demo_lesson,
//                'video_presentation' => $request->video_presentation,
//                'phone' => $request->phone,
//                'profile_title' => $request->profile_title,
//                'about_teacher' => $request->about_teacher,
//                'education_place' => $request->education_place,
//                'speciality' => $request->speciality,
//                'degree' => $request->degree,
//                'certificate' => $request->certificate,
//                'ctf_image' => $request->ctf_image,
//                'work_experience' => $request->work_experience,
//                'work_place' => $request->work_place,
//                'work_position' => $request->work_position,
//                'work_date' => $request->work_date,
//                'lesson_price' => $request->lesson_price,
//                'balance' => $request->balance,
//            ]);
//        } else {
            $image = $teacher->image;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }
            $teacher->image = $image;
            $teacher->father_name = $request->father_name;
            $teacher->teacher_address = $request->teacher_address;
            $teacher->birthday = $request->birthday;
            $teacher->language = $langs;
            $teacher->gender = $request->gender;
            $teacher->lessons_duration = $request->lessons_duration;
            $teacher->lessons_intensivity = $request->lessons_intensivity;
            $teacher->student_level = $request->student_level;
            $teacher->students_amount = $request->students_amount;
            $teacher->profile_type = $request->profile_type;
            $teacher->subjects = $request->subjects;
            $teacher->subjects_category = $request->subjects_category;
            $teacher->teaching_time = $request->teaching_time;
            $teacher->demo_lesson = $request->demo_lesson;
            $teacher->video_presentation = $request->video_presentation;
            $teacher->phone = $request->phone;
            $teacher->country = $request->country;
            $teacher->city = $request->city;
            $teacher->profile_title = $request->profile_title;
            $teacher->about_teacher = $request->about_teacher;
            $teacher->education_place = $request->education_place;
            $teacher->speciality = $request->speciality;
            $teacher->degree = $request->degree;
            $teacher->certificate = $request->certificate;
            $teacher->ctf_image = $request->ctf_image;
            $teacher->work_experience = $request->work_experience;
            $teacher->work_place = $request->work_place;
            $teacher->work_position = $request->work_position;
            $teacher->work_date = $request->work_date;
            $teacher->lesson_price = $request->lesson_price;
            $teacher->balance = $request->balance;
            $teacher->save();

            if($request->name!= Auth::user()->name){
                $user->name=$request->name;
                $user->save();
            }
//            if($request->email!= Auth::user()->email){
//                $user->email=$request->email;
//                $user->save();
//            }
//        }
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
