<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursePostController extends Controller
{
    public function postMyProfile(Request $request)
    {
        $course = Course::where('user_id', Auth::user()->id)->first();
        $language = '';

        if (isset($request->language)) {
            foreach ($request->language as $l) {
                $language .= ',' . $l;
            }
        }

        if ($course == null) {
            $image=null;
            if (isset($request->image)) {
                $image= file_get_contents($request->file('image')->getRealPath());
            }
            Course::create([
                'image' => $image,
                'name' => $request->name,
                'video_presentation' => $request->video_presentation,
                'certificate' => $request->certificate,
                'mmc' => $request->mmc,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'skype_id' => $request->	skype_id,
                'profile_title' => $request->profile_title,
                'about_course' => $request->about_course,
                'subjects' => $request->subjects,
                'subjects_category' => $request->subjects_category,
                'demo_lesson' => $request->demo_lesson,
                'lesson_cost' => $request->lesson_cost,
                'balance' => $request->balance,
                'rating' => $request->rating,
                'student_mission' => $request->student_mission,
                'payment' => $request->payment,
                'rating' => $request->rating,
                'likes' => $request->likes,
                'dislike' => $request->dislike,
                'see_count' => $request->see_count,
                'course_type' => $request->course_type,
                'language' => $language,
                'lessons_duration' => $request->	lessons_duration,
                'lessons_intensivity' => $request->lessons_intensivity,
                'students_amount' => $request->students_amount,
                'slug' => $request->slug,
                'country' => $request->country,
                'city' => $request->city,
                'user_id' => Auth::user()->id,
                'verified_status' => $request->verified_status,
                'status' => $request->status


            ]);
        } else {
            $image=$course->image;
            if (isset($request->image)) {
                $image= file_get_contents($request->file('image')->getRealPath());
            }
            $course->image = $image;
            $course->name = $request->name;
            $course->video_presentation = $request->video_presentation;
            $course->certificate = $request->certificate;
            $course->mmc = $request->mmc;
            $course->address = $request->address;
            $course->email = $request->email;
            $course->phone = $request->phone;
            $course->skype_id = $request->skype_id;
            $course->profile_title = $request->profile_title;
            $course->about_course = $request->	about_course;
            $course->subjects = $request->subjects;
            $course->subjects_category = $request->subjects_category;
            $course->demo_lesson = $request->demo_lesson;
            $course->lesson_cost = $request->lesson_cost;
            $course->balance = $request->balance;
            $course->rating = $request->rating;
            $course->likes = $request->likes;
            $course->dislike = $request->dislike;
            $course->see_count = $request->see_count;
            $course->course_type = $request->course_type;
            $course->language = $language;
            $course->lessons_duration = $request->lessons_duration;
            $course->lessons_intensivity = $request->lessons_intensivity;
            $course->students_amount = $request->students_amount;
            $course->slug = $request->slug;
            $course->country = $request->country;
            $course->city = $request->city;
            $course->verified_status = $request->verified_status;
            $course->status = $request->status;
            $course->save();
        }
        return back();
    }
}
