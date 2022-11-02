<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminGetController;
use App\Http\Controllers\StudentGetController;

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

Route::get('contact_us', [AdminGetController::class, 'getContactUs']);
Route::get('teacher', [AdminGetController::class, 'getTeacher']);
Route::get('student', [AdminGetController::class, 'getStudent']);
Route::get('course', [AdminGetController::class, 'getCourse']);
Route::get('blogs', [AdminGetController::class, 'getBlogs']);
Route::get('admins', [AdminGetController::class, 'getAdminsProject']);
Route::get('blog_category', [AdminGetController::class, 'getBlogCategory']);
Route::get('blog_comment', [AdminGetController::class, 'getBlogComment']);
