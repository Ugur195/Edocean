<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeGetController;
use App\Http\Controllers\HomePostController;
use App\Http\Controllers\AdminGetController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\StudentGetController;
use App\Http\Controllers\StudentPostController;
use App\Http\Controllers\TeacherGetController;
use App\Http\Controllers\TeacherPostController;
use App\Http\Controllers\CourseGetController;
use App\Http\Controllers\CoursePostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// front end
Route::get('/', [HomeGetController::class, 'home'])->name('home');
Route::get('/index', [HomeGetController::class, 'home']);
Route::get('/contact_us', [HomeGetController::class, 'GetContactUs']);
Route::get('/sign_in', [HomeGetController::class, 'GetSignIn'])->name('sign_in')->middleware('guest');
Route::get('/sign_up', [HomeGetController::class, 'GetSignUp'])->name('sign_up')->middleware('guest');
Route::get('/logout', [HomeGetController::class, 'GetLogout'])->name('logout');
Route::get('/index', [HomeGetController::class, 'GetIndex']);


Route::post('/contact_us', [HomePostController::class, 'PostContactUs']);
Route::post('/sign_in', [HomePostController::class, 'PostSignIn']);
Route::post('/sign_up', [HomePostController::class, 'PostSignUp']);


//admin
Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {
    Route::get('/index', [AdminGetController::class, 'home']);
    Route::get('/contact_us', [AdminGetController::class, 'ContactUs']);
    Route::get('/messages_edit/{id}', [AdminGetController::class, 'MessagesEdit'])->name('admin.messages_edit');
    Route::get('/about_us', [AdminGetController::class, 'AboutUs']);
    Route::get('/setting', [AdminGetController::class, 'Setting']);
    Route::get('/teacher', [AdminGetController::class, 'Teacher'])->name('AdminTeacher');
    Route::get('/teacher_edit/{id}', [AdminGetController::class, 'TeacherEdit'])->name('admin.backend.teacher_edit');
    Route::get('/student', [AdminGetController::class, 'Student'])->name('AdminStudent');
    Route::get('/student_edit/{id}', [AdminGetController::class, 'StudentEdit'])->name('admin.backend.student_edit');
    Route::get('/course', [AdminGetController::class, 'Course'])->name('AdminCourse');
    Route::get('/course_edit/{id}', [AdminGetController::class, 'CourseEdit'])->name('admin.backend.course_edit');
    Route::get('/blogs', [AdminGetController::class, 'Blogs']);
    Route::get('/blog_comment', [AdminGetController::class, 'BlogsComment']);
    Route::get('/blog_category', [AdminGetController::class, 'BlogsCategory']);


    Route::post('/about_us', [AdminPostController::class, 'AboutUs']);
    Route::post('/setting', [AdminPostController::class, 'Setting']);
    Route::post('/messages_edit/{id}', [AdminPostController::class, 'MessagesEdit']);
    Route::post('/contact_us', [AdminPostController::class, 'ContactUsDelete']);
    Route::post('/teacher', [AdminPostController::class, 'TeachersDelete']);
    Route::post('/student', [AdminPostController::class, 'StudentsDelete']);
    Route::post('/course', [AdminPostController::class, 'CoursesDelete']);


});


//student
Route::group(['prefix' => 'admin/student'], function () {
    Route::get('/my_profile', [StudentGetController::class, 'getMyProfile']);
    Route::get('/index', [StudentGetController::class, 'Student']);
    Route::get('/student_attendance', [StudentGetController::class, 'StudentAttendance']);
    Route::get('/student_schedule', [StudentGetController::class, 'StudentSchedule']);

    Route::post('/my_profile', [StudentPostController::class, 'postMyProfile']);

});


//teacher
Route::group(['prefix' => 'admin/teacher'], function () {
    Route::get('/my_profile', [TeacherGetController::class, 'getTeacherProfile']);
    Route::get('/index', [TeacherGetController::class, 'Teacher']);
    Route::get('/teacher_schedule', [TeacherGetController::class, 'TeacherSchedule']);
    Route::get('GetSubCatEdit/{id}', [TeacherGetController::class, 'GetSubCatEdit']);


    Route::post('/my_profile', [TeacherPostController::class, 'postTeacherProfile']);


});


//course
Route::group(['prefix' => 'admin/course'], function () {
    Route::get('/my_profile', [CourseGetController::class, 'MyCourse']);
    Route::get('/index', [CourseGetController::class, 'Course']);
    Route::get('/course_schedule', [CourseGetController::class, 'CourseSchedule']);
    Route::get('GetSubCatEdit/{id}', [CourseGetController::class, 'GetSubCatEdit']);


    Route::post('/my_profile', [CoursePostController::class, 'postMyProfile']);


});


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
