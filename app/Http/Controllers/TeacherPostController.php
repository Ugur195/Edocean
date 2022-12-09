<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeacherPostController extends Controller
{
    public function postTeacherProfile(Request $request)
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $langs = '';

        if (isset($request->langs)) {
            foreach ($request->langs as $l) {
                $langs .= ',' . $l;
            }
        }

        if ($teacher == null) {
            $image = null;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }


            Teacher::create([
                'image' => $image,
                'name' => $request->name,
                'surname' => $request->surname,
                'father_name' => $request->father_name,
                'email' => $request->email,
                'teacher_address' => $request->teacher_address,
                'birthday' => $request->birthday,
                'user_id' => Auth::user()->id,
                'language' => $langs,
                'gender' => $request->gender,
                'lessons_duration' => $request->lessons_duration,
                'lessons_intensivity' => $request->lessons_intensivity,
                'student_level' => $request->student_level,
                'students_amount' => $request->students_amount,
                'profile_type' => $request->profile_type,
                'country' => $request->country,
                'city' => $request->city,
                'subjects' => $request->subjects,
                'subjects_category' => $request->subjects_category,
                'teaching_time' => $request->teaching_time,
                'demo_lesson' => $request->demo_lesson,
                'video_presentation' => $request->video_presentation,
                'phone' => $request->phone,
                'skype_id' => $request->skype_id,
                'profile_title' => $request->profile_title,
                'about_teacher' => $request->about_teacher,
                'education_place' => $request->education_place,
                'speciality' => $request->speciality,
                'degree' => $request->degree,
                'certificate' => $request->certificate,
                'ctf_image' => $request->ctf_image,
                'work_experience' => $request->work_experience,
                'work_place' => $request->work_place,
                'work_position' => $request->work_position,
                'work_date' => $request->work_date,
                'lesson_price' => $request->lesson_price,
                'balance' => $request->balance,

            ]);
        } else {
            $image = $teacher->image;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }
            $teacher->image = $image;
            $teacher->name = $request->name;
            $teacher->surname = $request->surname;
            $teacher->father_name = $request->father_name;
            $teacher->email = $request->email;
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
            $teacher->skype_id = $request->skype_id;
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
        }
        return back();

    }

// Course

    public function StudentRequestsChangeDelete(Request $request)
    {
        try {
            if ($request->button_accept != null) {
                if ($request->status == 0) {
                    TeacherStudent::find($request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student gebul oldu!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Student gebul etmek mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                TeacherStudent::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'StudentRequests Silindi', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'StudentRequests Silmek mumkun olmadi', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Studenti silmek olmur!', 'status' => 'error']);
        }
    }


}
