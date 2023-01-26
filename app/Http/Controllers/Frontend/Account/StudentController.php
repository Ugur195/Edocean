<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $student = Student::where('user_id', Auth::id())->first();
        return view('account.student.index', compact('student'));
    }

    public function showStudentSchedule()
    {
        $student = Student::where('user_id', Auth::id())->first();
        return view('account.student.student_schedule', compact('student'));
    }

    public function showChangePassword()
    {
        $student = Student::where('user_id', Auth::id())->first();
        return view('account.student.change-password', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(): View
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $data = DB::table('subject_category')->get();
        $user = null;
        if ($student == null) {
            $user = User::find(Auth::user()->id);
        } else {
            $user = $student;
        }
        return view('account.student.edit', ['student' => $user, 'data' => $data]);
    }

    public function getSubjectsByCategoryId($id)
    {
        echo json_encode(DB::table('subjects')->where('subject_category_id', $id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $user = User::find(Auth::user()->id);
        $langs = '';

        if (isset($request->langs)) {
            foreach ($request->langs as $l) {
                $langs .= ',' . $l;
            }
        }
        $image = $student->image;
        if (isset($request->image)) {
            $image = file_get_contents($request->file('image')->getRealPath());
        }

        $student->image = $image;
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
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->country = $request->country;
        $student->city = $request->city;
        $student->student_mission = $request->student_mission;
        $student->payment = $request->payment;
        $student->save();

        if ($request->name != Auth::user()->name) {
            $user->name = $request->name;
            $user->save();
        }

        if ($request->email != Auth::user()->email) {
            $user->email = $request->email;
            $user->save();
        }

        return back();

    }

    public function ChangePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return response(['title' => 'Ugursuz!', 'message' => 'Cari parolunuz təqdim etdiyiniz parolla uyğun gəlmir. Zəhmət olmasa bir daha cəhd edin', 'status' => 'error']);
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return response(['title' => 'Ugursuz!', 'message' => 'Yeni Parol cari parolunuzla eyni ola bilməz. Fərqli parol seçin!', 'status' => 'error']);
        }

        if (($request->get('new-password') !== $request->get('new-password_confirmation'))) {
            //New password and new password confirmation are same
            return response(['title' => 'Ugursuz!', 'message' => 'Yeni parol və yeni təsdiqlənmiş parol uyğun gəlmir!', 'status' => 'error']);
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);


        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();


        return response(['title' => 'Ugurlu!', 'message' => 'Parol uğurla dəyişdirildi!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
