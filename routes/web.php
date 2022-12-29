<?php

use App\Http\Controllers\Admin\{
    MenuController,
    SettingController,
    AboutUsController,
    ContactUsController
};
use App\Http\Controllers\Frontend\{
  ContactUsController as ContactUsFrontController
};
use App\Http\Controllers\AdminGetController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CourseGetController;
use App\Http\Controllers\CoursePostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeGetController;
use App\Http\Controllers\HomePostController;
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
Route::get('/', [HomeGetController::class, 'home'])->name('home');
Route::get('contact_us',[ContactUsFrontController::class, 'index']);
Route::post('contact_us/send_message',[ContactUsFrontController::class, 'sendMessage'])->name('contact_us.send_message');
Route::get('/sign_in', [HomeGetController::class, 'GetSignIn'])->name('sign_in')->middleware('guest');
Route::get('/sign_up', [HomeGetController::class, 'GetSignUp'])->name('sign_up')->middleware('guest');
Route::get('/logout', [HomeGetController::class, 'GetLogout'])->name('logout');
Route::get('/blogs', [HomeGetController::class, 'Blogs']);
Route::get('/blogs/category/{category}', [HomeGetController::class, 'BlogsCategory'])->name('blogs_category');
Route::get('/single_blog/{id}', [HomeGetController::class, 'SingleBlog']);
Route::get('/teachers', [HomeGetController::class, 'Teachers']);
Route::get('/single_teacher/{id}', [HomeGetController::class, 'SingleTeacher'])->name('single_teacher');
Route::get('/teachers/category/{category}', [HomeGetController::class, 'TeachersCategory'])->name('subjects_category');
Route::get('/teachers/subject/{category}', [HomeGetController::class, 'TeachersSubject'])->name('subjects');
Route::get('/students', [HomeGetController::class, 'Students']);
Route::get('/single_student/{id}', [HomeGetController::class, 'SingleStudent'])->name('single_student');
Route::get('/courses', [HomeGetController::class, 'Courses']);


Route::post('/sign_in', [HomePostController::class, 'PostSignIn']);
Route::post('/sign_up', [HomePostController::class, 'PostSignUp']);
Route::post('/single_blog/{id}', [HomePostController::class, 'SingleBlog']);


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
    Route::get('/blogs', [AdminGetController::class, 'Blogs'])->name('AdminBlogs');
    Route::get('/blogs_add', [AdminGetController::class, 'AddBlogs'])->name('BlogsAdd');
    Route::get('/blogs_edit/{id}', [AdminGetController::class, 'BlogsEdit'])->name('admin.backend.blogs_edit');
    Route::get('/blog_comment', [AdminGetController::class, 'BlogComment'])->name('AdminBlogComment');
    Route::get('/blog_category', [AdminGetController::class, 'BlogCategory'])->name('AdminBlogCategory');
    Route::get('/blog_category_edit/{id}', [AdminGetController::class, 'BlogCategoryEdit'])->name('admin.backend.blog_category_edit');
    Route::get('/add_blog_category', [AdminGetController::class, 'AddBlogCategory'])->name('AddBlogCategory');
    Route::get('/blog_comment_edit/{id}', [AdminGetController::class, 'BlogCommentEdit'])->name('admin.backend.blog_comment_edit');
    Route::get('/admins', [AdminGetController::class, 'AdminsProject'])->name('AdminEdocean');
    Route::get('/add_admins', [AdminGetController::class, 'AddAdmin'])->name('AddAdmin');
    Route::get('/admins_edit/{id}', [AdminGetController::class, 'AdminsEditProject'])->name('admin.backend.admins_edit');
    Route::name('admin.')->group(function () {
        Route::resource('menus', MenuController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('about_us', AboutUsController::class);
        Route::resource('contact_us', ContactUsController::class);
    });


    Route::post('/teacher', [AdminPostController::class, 'TeachersBlockUnblockDelete']);
    Route::post('/student', [AdminPostController::class, 'StudentsBlockUnblockDelete']);
    Route::post('/course', [AdminPostController::class, 'CoursesBlockUnblockDelete']);
    Route::post('/blogs', [AdminPostController::class, 'BlogsBlockUnblockDelete']);
    Route::post('/blogs_image_delete', [AdminPostController::class, 'BlogsImageDelete']);
    Route::post('/blogs_edit/{id}', [AdminPostController::class, 'BlogsEdit'])->name('admin.edit.blog');
    Route::post('/blogs_add', [AdminPostController::class, 'BlogsAdd'])->name('admin.add.blog');
    Route::post('/blog_category', [AdminPostController::class, 'BlogCategoryDelete']);
    Route::post('/blog_category_edit/{id}', [AdminPostController::class, 'BlogCategoryEdit']);
    Route::post('/add_blog_category', [AdminPostController::class, 'AddBlogCategory']);
    Route::post('/add_admins', [AdminPostController::class, 'AddAdmin']);
    Route::post('/admins', [AdminPostController::class, 'AdminsBlockUnblockDelete']);
    Route::post('/admins_edit/{id}', [AdminPostController::class, 'AdminEdit']);
    Route::post('/blog_comment', [AdminPostController::class, 'BlogCommentPublishUnpublishDelete']);

});

Route::middleware('auth', 'verified')->group(function () {
    //student
    Route::prefix('admin/student')->middleware('permission:4')->group(function () {
        Route::get('/my_profile', [StudentGetController::class, 'getMyProfile']);
        Route::get('/index', [StudentGetController::class, 'Student']);
        Route::get('/student_course', [StudentGetController::class, 'StudentCourse'])->name('StudentCourse');
        Route::get('/student_course_edit/{id}', [StudentGetController::class, 'StudentCourseEdit'])->name('admin.student_course_edit');
        Route::get('/teacher_info/{id}', [StudentGetController::class, 'TeacherInfoEdit'])->name('admin.student.teacher_info');
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
        Route::get('/mycourses', [TeacherGetController::class, 'Courses'])->name('TeacherCourses');
        Route::get('/cInfo/{id}', [TeacherGetController::class, 'CourseInfo'])->name('admin.teacher_info');
        Route::get('/mystudents', [TeacherGetController::class, 'Students'])->name('TeacherStudents');
        Route::get('/sInfo/{id}', [TeacherGetController::class, 'StudentInfo'])->name('admin.student_info');

        Route::post('/my_profile', [TeacherPostController::class, 'postTeacherProfile']);
        Route::post('/mystudents', [TeacherPostController::class, 'StudentRequestsChangeDelete']);
    });

    //course
    Route::prefix('admin/course')->middleware('permission:2')->group(function () {
        Route::get('/my_profile', [CourseGetController::class, 'MyCourse']);
        Route::get('/index', [CourseGetController::class, 'Course']);
        Route::get('/course_students', [CourseGetController::class, 'CourseStudentRequests'])->name('CourseStudents');
        Route::get('/course_students_edit/{id}', [CourseGetController::class, 'CourseStudentEdit'])->name('admin.course.course_students_edit');
        Route::get('/course_teachers', [CourseGetController::class, 'CourseTeacherRequests'])->name('CourseTeacher');
        Route::get('/course_teachers_edit/{id}', [CourseGetController::class, 'CourseTeacherEdit'])->name('admin.course.course_teachers_edit');
        Route::get('/course_schedule', [CourseGetController::class, 'CourseSchedule']);
        Route::get('GetSubCatEdit/{id}', [CourseGetController::class, 'GetSubCatEdit']);


        Route::post('/my_profile', [CoursePostController::class, 'postMyProfile']);
        Route::post('/course_students', [CoursePostController::class, 'StudentRequestsChangeDelete']);
        Route::post('/course_teachers', [CoursePostController::class, 'TeacherRequestsChangeDelete']);

    });
});


Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

