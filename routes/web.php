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
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeGetController::class, 'home']);
Route::get('/index', [HomeGetController::class, 'home']);
Route::get('/contact_us', [HomeGetController::class, 'GetContactUs']);
Route::get('/sign_in', [HomeGetController::class, 'GetSignIn']);
Route::get('/sign_up', [HomeGetController::class, 'GetSignUp']);
Route::get('/index', [HomeGetController::class, 'GetIndex']);


Route::post('/contact_us', [HomePostController::class, 'PostContactUs']);
Route::post('/sign_in', [HomePostController::class, 'PostSignIn']);
Route::post('/sign_up', [HomePostController::class, 'PostSignUp']);

//admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/index', [AdminGetController::class, 'home']);
    Route::get('/contact_us', [AdminGetController::class, 'ContactUs']);
    Route::get('/about_us', [AdminGetController::class, 'AboutUs']);
    Route::get('/setting', [AdminGetController::class, 'Setting']);


    Route::post('/about_us', [AdminPostController::class, 'AboutUs']);
    Route::post('/setting', [AdminPostController::class, 'Setting']);


});


//student
Route::group(['prefix' => 'admin/student'], function () {
    Route::get('/index', [StudentGetController::class, 'Student']);
    Route::get('/student_attendance', [StudentGetController::class, 'StudentAttendance']);
    Route::get('/student_schedule', [StudentGetController::class, 'StudentSchedule']);


});


//teacher
Route::group(['prefix' => 'admin/teacher'], function () {
    Route::get('/index', [TeacherGetController::class, 'Teacher']);
    Route::get('/teacher_schedule', [TeacherGetController::class, 'TeacherSchedule']);


});



Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
