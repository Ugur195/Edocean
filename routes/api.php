<?php

use App\Http\Controllers\Admin\{
    MenuController,ContactUsController,
    BlogController,BlogCategoryController,
    BlogCommentsController,AdminController,
    TeacherController
};
use App\Http\Controllers\AdminGetController;
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

Route::get('admins', [AdminController::class, 'getAdmin']);
Route::get('contact_us', [ContactUsController::class, 'getContactUs']);
Route::get('menus', [MenuController::class, 'getMenu']);
Route::get('blogs', [BlogController::class, 'getBlogs']);
Route::get('blog_categories', [BlogCategoryController::class, 'blogCategory']);
Route::get('blog_comments', [BlogCommentsController::class, 'blogComment']);
Route::get('teachers', [TeacherController::class, 'getTeacher']);
Route::get('student', [AdminGetController::class, 'getStudent']);
Route::get('course', [AdminGetController::class, 'getCourse']);


