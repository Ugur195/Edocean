<?php

use App\Http\Controllers\Admin\{
    AboutUsController,
    AdminController,
    AuthController,
    BlogCategoryController,
    BlogCommentsController,
    BlogController,
    ContactUsController,
    MenuController,
    TeacherController as TeacherAdminController,
    StudentController as StudentAdminController,
    CourseController as CourseAdminController,
    SettingController
};
use App\Http\Controllers\Frontend\{
    AuthController as AuthFrontController,
    BlogController as BlogFrontController,
    ContactUsController as ContactUsFrontController,
    AboutUsController as AboutUsFrontController,
    TeacherController,StudentController
};
use App\Http\Controllers\Frontend\Account\{
    TeacherController as TeacherFrontController,
    StudentController as StudentFrontController
};
use App\Http\Controllers\AdminGetController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CourseGetController;
use App\Http\Controllers\CoursePostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeGetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::name('frontend.')->group(function () {
    Route::get('/', [AuthFrontController::class, 'home'])->name('home');
    Route::get('/login', [AuthFrontController::class, 'login'])->name('login')->middleware('guest');
    Route::get('/register', [AuthFrontController::class, 'register'])->name('register')->middleware('guest');
    Route::get('/logout', [AuthFrontController::class, 'logout'])->name('logout');
    Route::post('/login/user', [AuthFrontController::class, 'loginUser'])->name('login.user');
    Route::post('/register/user', [AuthFrontController::class, 'registerUser'])->name('register.user');
    Route::get('/contact_us', [ContactUsFrontController::class, 'index']);
    Route::post('contact_us/send_message', [ContactUsFrontController::class, 'sendMessage'])->name('contact_us.send_message');
    Route::get('/about_us', [AboutUsFrontController::class, 'index']);
    Route::resource('/blogs', BlogFrontController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/students',StudentController::class);


    Route::get('/courses', [HomeGetController::class, 'Courses']);
});


//admin
Route::prefix('admin')->middleware(['Admin', 'permission:1'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/home', [AdminController::class, 'home']);
        Route::resource('admins', AdminController::class);
        Route::post('/admins/change-status', [AdminController::class, 'changeStatus'])->name('admins.block_unblock');
        Route::resource('teachers', TeacherAdminController::class);
        Route::resource('students', StudentAdminController::class);
        Route::resource('courses',CourseAdminController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('about_us', AboutUsController::class);
        Route::resource('contact_us', ContactUsController::class);
        Route::resource('blogs', BlogController::class);
        Route::post('/blogs/change-status', [BlogController::class, 'changeStatus'])->name('blogs.block_unblock');
        Route::post('destroy/blog', [BlogController::class, 'destroyBlog'])->name('destroy.blog');
        Route::post('destroy/blog-image', [BlogController::class, 'destroyBlogImage']);
        Route::resource('blog_categories', BlogCategoryController::class);
        Route::resource('blog_comments', BlogCommentsController::class);
    });
});


Route::prefix('account')->name('account.')->middleware('auth', 'verified')->group(function () {

    //student
    Route::middleware('permission:4')->group(function () {
        Route::resource('student', StudentFrontController::class);
        Route::prefix('student')->name('student.')->group(function () {
            Route::get('category/{id}/subjects', [StudentFrontController::class, 'getSubjectsByCategoryId'])->name('list.category-subjects');
            Route::get('/student/schedule', [StudentFrontController::class, 'showStudentSchedule'])->name('student.schedule');
            //испрвить-название!!!
            Route::get('change/password', [StudentFrontController::class, 'showChangePassword'])->name('show.change-password');
            Route::post('change/password', [StudentFrontController::class, 'ChangePassword'])->name('changePassword');
        });

    });

    //teacher
    Route::middleware('permission:3')->group(function () {
        Route::resource('teacher', TeacherFrontController::class);
        Route::prefix('teacher')->name('teacher.')->group(function () {
            Route::get('category/{id}/subjects', [TeacherFrontController::class, 'getSubjectsByCategoryId'])->name('list.category-subjects');
            Route::get('change/password', [TeacherFrontController::class, 'showChangePassword'])->name('change-password');
            Route::post('change/password', [TeacherFrontController::class, 'ChangePassword'])->name('changePassword');
        });
    });


    //course
    Route::prefix('course')->middleware('permission:2')->group(function () {
        Route::get('/my_profile', [CourseGetController::class, 'MyCourse']);
        Route::get('/index', [CourseGetController::class, 'Course']);
        Route::get('/course_schedule', [CourseGetController::class, 'CourseSchedule']);
        Route::get('GetSubCatEdit/{id}', [CourseGetController::class, 'GetSubCatEdit']);
        Route::post('/my_profile', [CoursePostController::class, 'postMyProfile']);
    });
});


Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

