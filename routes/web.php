<?php

use App\Http\Controllers\Admin\{
    MenuController, SettingController,
    AboutUsController, ContactUsController,
    AuthController, BlogController,
    BlogCategoryController,BlogCommentsController,
    AdminController
};
use App\Http\Controllers\Frontend\{
    ContactUsController as ContactUsFrontController,
    AuthController as AuthFrontController,
    BlogController as BlogFrontController
};
use App\Http\Controllers\AdminGetController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CourseGetController;
use App\Http\Controllers\CoursePostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeGetController;
use App\Http\Controllers\StudentGetController;
use App\Http\Controllers\StudentPostController;
use App\Http\Controllers\TeacherGetController;
use App\Http\Controllers\TeacherPostController;
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
Route::name('frontend.')->group(function() {
    Route::get('/', [HomeGetController::class, 'home'])->name('home');
    Route::get('contact_us', [ContactUsFrontController::class, 'index']);
    Route::post('contact_us/send_message', [ContactUsFrontController::class, 'sendMessage'])->name('contact_us.send_message');
    Route::get('/login', [AuthFrontController::class, 'login'])->name('login')->middleware('guest');
    Route::get('/register', [AuthFrontController::class, 'register'])->name('register')->middleware('guest');
    Route::get('/logout', [AuthFrontController::class, 'logout'])->name('logout');
    Route::post('/login/user', [AuthFrontController::class, 'loginUser'])->name('login.user');
    Route::post('/register/user', [AuthFrontController::class, 'registerUser'])->name('register.user');


    Route::resource('blogs',BlogFrontController::class);
    //Route::get('/blogs/category/{category}', [HomeGetController::class, 'BlogsCategory'])->name('blogs_category');

    Route::get('/teachers', [HomeGetController::class, 'Teachers']);
    Route::get('/single_teacher/{id}', [HomeGetController::class, 'SingleTeacher'])->name('single_teacher');
    Route::get('/teachers/category/{category}', [HomeGetController::class, 'TeachersCategory'])->name('subjects_category');
    Route::get('/teachers/subject/{category}', [HomeGetController::class, 'TeachersSubject'])->name('subjects');
    Route::get('/students', [HomeGetController::class, 'Students']);
    Route::get('/single_student/{id}', [HomeGetController::class, 'SingleStudent'])->name('single_student');
    Route::get('/courses', [HomeGetController::class, 'Courses']);
});





//admin
Route::prefix('admin')->middleware(['Admin', 'permission:1'])->group(function () {
    Route::get('/index', [AdminGetController::class, 'home']);
    Route::get('/admins', [AdminGetController::class, 'Admins']);
    Route::get('/teacher', [AdminGetController::class, 'Teacher'])->name('AdminTeacher');
    Route::get('/teacher_edit/{id}', [AdminGetController::class, 'TeacherEdit'])->name('admin.backend.teacher_edit');
    Route::get('/student', [AdminGetController::class, 'Student'])->name('AdminStudent');
    Route::get('/student_edit/{id}', [AdminGetController::class, 'StudentEdit'])->name('admin.backend.student_edit');
    Route::get('/course', [AdminGetController::class, 'Course'])->name('AdminCourse');
    Route::get('/course_edit/{id}', [AdminGetController::class, 'CourseEdit'])->name('admin.backend.course_edit');


//    Route::get('/admins', [AdminGetController::class, 'AdminsProject'])->name('AdminEdocean');
//    Route::get('/add_admins', [AdminGetController::class, 'AddAdmin'])->name('AddAdmin');
//    Route::get('/admins_edit/{id}', [AdminGetController::class, 'AdminsEditProject'])->name('admin.backend.admins_edit');
//    Route::post('/add_admins', [AdminPostController::class, 'AddAdmin']);
//    Route::post('/admins', [AdminPostController::class, 'AdminsBlockUnblockDelete']);
//    Route::post('/admins_edit/{id}', [AdminPostController::class, 'AdminEdit']);

    Route::name('admin.')->group(function () {
        Route::resource('admins',AdminController::class);
        Route::post('/admins/change-status', [AdminController::class, 'changeStatus'])->name('admins.block_unblock');
        Route::resource('menus', MenuController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('about_us', AboutUsController::class);
        Route::resource('contact_us', ContactUsController::class);
        Route::resource('blogs', BlogController::class);
        Route::post('/blogs/change-status', [BlogController::class, 'changeStatus'])->name('blogs.block_unblock');
        Route::post('destroy/blog', [BlogController::class, 'destroyBlog'])->name('destroy.blog');
        Route::post('destroy/blog-image', [BlogController::class, 'destroyBlogImage']);
        Route::resource('blog_categories',BlogCategoryController::class);
        Route::resource('blog_comments',BlogCommentsController::class);
    });


    Route::post('/teacher', [AdminPostController::class, 'TeachersBlockUnblockDelete']);
    Route::post('/student', [AdminPostController::class, 'StudentsBlockUnblockDelete']);
    Route::post('/course', [AdminPostController::class, 'CoursesBlockUnblockDelete']);
});

Route::middleware('auth', 'verified')->group(function () {
    //student
    Route::prefix('admin/student')->middleware('permission:4')->group(function () {
        Route::get('/my_profile', [StudentGetController::class, 'getMyProfile']);
        Route::get('/index', [StudentGetController::class, 'Student']);
        Route::get('/student_attendance', [StudentGetController::class, 'StudentAttendance']);
        Route::get('/student_schedule', [StudentGetController::class, 'StudentSchedule']);
        Route::get('GetSubCatStuEdit/{id}', [StudentGetController::class, 'GetSubCatStuEdit']);
        Route::post('/my_profile', [StudentPostController::class, 'postMyProfile']);

    });

    //teacher
    Route::prefix('admin/teacher')->middleware('permission:3')->group(function () {
        Route::get('/my_profile', [TeacherGetController::class, 'getTeacherProfile']);
        Route::get('/index', [TeacherGetController::class, 'Teacher']);
        Route::get('/teacher_schedule', [TeacherGetController::class, 'TeacherSchedule']);
        Route::get('GetSubCatTeachEdit/{id}', [TeacherGetController::class, 'GetSubCatTeachEdit']);
        Route::post('/my_profile', [TeacherPostController::class, 'postTeacherProfile']);
    });



    //course
    Route::prefix('admin/course')->middleware('permission:2')->group(function () {
        Route::get('/my_profile', [CourseGetController::class, 'MyCourse']);
        Route::get('/index', [CourseGetController::class, 'Course']);
        Route::get('/course_schedule', [CourseGetController::class, 'CourseSchedule']);
        Route::get('GetSubCatEdit/{id}', [CourseGetController::class, 'GetSubCatEdit']);
        Route::post('/my_profile', [CoursePostController::class, 'postMyProfile']);
    });
});



Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

