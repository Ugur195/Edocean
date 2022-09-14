<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeGetController;
use App\Http\Controllers\HomePostController;
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

Route::get('/', function () {
    return view('welcome');
});

// front end
Route::get('/contact_us', [HomeGetController::class, 'GetContactUs']);
Route::get('/sign_in', [HomeGetController::class, 'GetSignIn']);
Route::get('/sign_up', [HomeGetController::class, 'GetSignUp']);
Route::get('/index', [HomeGetController::class, 'GetIndex']);


Route::post('/contact_us', [HomePostController::class, 'PostContactUs']);
Route::post('/sign_in', [HomePostController::class, 'PostSignIn']);
Route::post('/sign_up', [HomePostController::class, 'PostSignUp']);



Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
