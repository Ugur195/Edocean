<?php

use App\Http\Controllers\Admin\{
    MenuController,ContactUsController,
    BlogController
};
use App\Http\Controllers\AdminGetController;
use App\Http\Controllers\CourseGetController;
use App\Http\Controllers\StudentGetController;
use App\Http\Controllers\TeacherGetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('contact_us', [ContactUsController::class, 'getContactUs']);
Route::get('menus', [MenuController::class, 'getMenu']);
Route::get('blogs', [BlogController::class, 'getBlogs']);
Route::get('teacher', [AdminGetController::class, 'getTeacher']);
Route::get('student', [AdminGetController::class, 'getStudent']);
Route::get('student_course', [StudentGetController::class, 'getStudentCourse']);
Route::get('course_students', [CourseGetController::class, 'getCourseStudentRequests']);
Route::get('course_teachers', [CourseGetController::class, 'getCourseTeacherRequests']);
Route::get('course', [AdminGetController::class, 'getCourse']);
Route::get('mycourses', [TeacherGetController::class, 'getCourses']);
Route::get('mystudents', [TeacherGetController::class, 'getStudents']);
Route::get('admins', [AdminGetController::class, 'getAdminsProject']);
Route::get('blog_category', [AdminGetController::class, 'getBlogCategory']);
Route::get('blog_comment', [AdminGetController::class, 'getBlogComment']);

