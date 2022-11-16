<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Admin;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Blogs;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PharIo\Version\Exception;

class AdminPostController extends Controller
{

    //Setting
    public function Setting(Request $request)
    {
        try {
            Setting::where('id', $request->id)->update(['url' => $request->url, 'title' => $request->title, 'description' => $request->description,
                'description_ru' => $request->description_ru, 'description_en' => $request->description_en, 'keywords' => $request->keywords,
                'author' => $request->author, 'phone' => $request->phone, 'fax' => $request->fax, 'email' => $request->email, 'address' => $request->address,
                'country' => $request->country, 'city' => $request->city, 'maps' => $request->maps, 'analytics' => $request->analytics,
                'facebook' => $request->facebook, 'twitter' => $request->twitter, 'instagram' => $request->instagram, 'youtube' => $request->youtube,
                'whatsapp' => $request->whatsapp, 'google' => $request->google, 'smpt_user' => $request->smpt_user, 'smpt_password' => $request->smpt_password,
                'host' => $request->host, 'port' => $request->port]);
            if (isset($request->logo)) {
                Setting::where('id', $request->id)->update(['logo' => file_get_contents($request->file('logo'))]);
            }
            return response(['title' => 'Ugurlu!', 'message' => 'Setting update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }

    }
    //finish Setting


    //About_Us
    public function AboutUs(Request $request)
    {
        try {
            AboutUs::where('id', $request->id)->update(['our_responsib' => $request->our_responsib, 'our_responsib_ru' => $request->our_responsib_ru,
                'our_responsib_en' => $request->our_responsib_en, 'content_az' => $request->content_az, 'content_ru' => $request->content_ru, 'content_en' =>
                    $request->content_en, 'video_link' => $request->video_link, 'video_sub_title' => $request->video_sub_title, 'video_sub_title_ru' => $request->
                video_sub_title_ru, 'video_sub_title_en' => $request->video_sub_title_en, 'our_purpose' => $request->our_purpose,
                'our_purpose_ru' => $request->our_purpose_ru, 'our_purpose_en' => $request->our_purpose_en]);
            return response(['title' => 'Ugurlu!', 'message' => 'About Us update oldu', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }
    }
    //finish About_Us


    //ContactUs/Messages
    public function MessagesEdit(Request $request)
    {
        try {
            Mail::send('emails.mesaj_gonder', ['msg' => 'Answer: ' . $request->answer], function ($message) use ($request) {
                $message->to($request->email, $request->full_name)->subject('Mail linki');
                $message->from('edocean_course@mail.ru', 'Edocean Course');
            });
            return response(['title' => 'Ugurlu!', 'message' => 'Mesajiniz gonderildi!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesajinizi gondermek mumkun olmadi', 'status' => 'error']);
        }
    }

    public function ContactUsDelete(Request $request)
    {
        try {
            ContactUs::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Mesaj Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesaji silmek olmur!', 'status' => 'error']);
        }

    }
    //finish ContactUs/Messages


    //Student
    public function StudentsBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    Student::find($request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    Student::find($request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Studenti bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Student::where('user_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Student ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Studenti silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Studenti silmek olmur!', 'status' => 'error']);
        }

    }
    //finish Student


    //Teacher
    public function TeachersBlockUnblockDelete(Request $request)
    {
//        return 'p';
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Teacher::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Teacher blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Teacher::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Teacher bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Teacheri bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Teacher::where('user_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Teacher ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Teacheri silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Teacheri silmek olmur!', 'status' => 'error']);
        }
    }
    //finish Teacher


    //Course
    public function CoursesDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    Course::find($request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Course blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    Course::find($request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Course bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Coursu bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                Course::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Course ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Coursu silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Coursu silmek olmur!', 'status' => 'error']);
        }

    }
    //finish Course


    //Admin
    public function AdminsBlockUnblockDelete(Request $request)
    {
        return 'l';
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Admin::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Admin blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Admin::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Admin bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Admini bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Admin::where('user_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Admin ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Admini silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Admini silmek olmur!', 'status' => 'error']);
        }

    }


    public function AddAdmin(Request $request)
    {
        $add_admin = User::where('name', $request->name)->first();
        if ($add_admin == null) {
            $add_admin = new User();
            $add_admin->fin = $request->fin;
            $add_admin->name = $request->name;
            $add_admin->email = $request->email;
            $add_admin->password = Hash::make($request->password);
            $add_admin->author = 1;
            $add_admin->slug = $request->name;
            $add_admin->status = 1;
            $add_admin->save();
            return response(['title' => 'Ugurlu!', 'message' => 'Yeni Admin elave edildi!', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Yeni Admin elave etmek mumkun olmadi', 'status' => 'error']);
        }
    }


    public function AdminEdit(Request $request, $id)
    {
        $admin_edit = Admin::where('user_id', $id)->first();
        $userEdit = User::find($id);
        $image = null;
        if (isset($request->image)) {
            $image = file_get_contents($request->file('image')->getRealPath());
        }
        if ($admin_edit == null) {
            Admin::create([
                'image' => $image,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'father_name' => $request->father_name,
                'birthday' => $request->birthday,
                'email' => $request->email,
                'user_id' => $id,
                'password' => $userEdit->password,
                'status' => 1,
            ]);
        } else {
            $image = $admin_edit->image;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }
            $admin_edit->image = $image;
            $admin_edit->first_name = $request->first_name;
            $admin_edit->last_name = $request->last_name;
            $admin_edit->father_name = $request->father_name;
            $admin_edit->birthday = $request->birthday;
            $admin_edit->email = $request->email;
            $admin_edit->user_id = $id;
            $admin_edit->password = $userEdit->password;
            $admin_edit->status = 1;
            $admin_edit->save();
        }
        return response(['title' => 'Ugurlu!', 'message' => 'Yeni Blog elave edildi!', 'status' => 'success']);
    }
    //finish Admin


    //Blogs

    public function BlogsEdit(Request $request)
    {
        try {
            Blogs::where('id', $request->id)->update(['title' => $request->title, 'title_ru' => $request->title_ru,
                'title_en' => $request->title_en, 'message' => $request->message, 'message_ru' => $request->message_ru,
                'message_en' => $request->message_en, 'author' => Auth::user()->id, 'category_id' => $request->category_id,
                'likes' => $request->likes, 'dislike' => $request->dislike, 'see_count' => $request->see_count,
                'slug' => $request->title, 'status' => $request->status]);
            if (isset($request->image)) {
                Blogs::where('id', $request->id)->update(['image' => file_get_contents($request->file('image'))]);
            }
            return response(['title' => 'Ugurlu!', 'message' => 'Blog update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => $exception->getMessage(), 'status' => 'error']);
        }
    }


    public function BlogsAdd(Request $request)
    {

        $blogs = Blogs::where('title', $request->title)->first();
        if ($blogs == null) {
            $image = null;
            if (isset($request->image)) {
                $image = file_get_contents($request->file('image')->getRealPath());
            }
            $blogs = new Blogs();
            $blogs->image = $image;
            $blogs->title = $request->title;
            $blogs->title_ru = $request->title_ru;
            $blogs->title_en = $request->title_en;
            $blogs->message = $request->message;
            $blogs->message_ru = $request->message_ru;
            $blogs->message_en = $request->message_en;
            $blogs->author = Auth::user()->id;
            $blogs->category_id = $request->blog_category;
            $blogs->slug = $request->title;
            $blogs->status = 1;
            $blogs->likes = 0;
            $blogs->dislike = 0;
            $blogs->see_count = 0;
            $blogs->save();
            return response(['title' => 'Ugurlu!', 'message' => 'Yeni Blog elave edildi!', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Yeni Blog elave etmek mumkun olmadi', 'status' => 'error']);
        }
    }


    public function BlogsBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    Blogs::find($request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Blogs blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    Blogs::find($request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Blogs bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Blogsi bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                Blogs::where('id', $request->id)->delete();
                BlogComment::where('blog_id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Blogs ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Blogsi silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Blogsi silmek olmur!', 'status' => 'error']);
        }
    }
    //finish Blogs


    //Blog Category
    public function BlogCategoryEdit(Request $request)
    {
        try {
            BlogCategory::where('id', $request->id)->update(['name' => $request->name,
                'slug' => $request->slug, 'status' => $request->status]);
            return response(['title' => 'Ugurlu!', 'message' => 'BlogCategory update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'BlogCategory update olmadi', 'status' => 'error']);
        }
    }


    public function BlogCategoryDelete(Request $request)
    {
        try {
            $blogCategory = BlogCategory::with('comments')->find($request->id);

            DB::transaction(function () use ($blogCategory) {
                $blogCategory->comments()->delete();
                $blogCategory->blogs()->delete();
                $blogCategory->delete();
            });
            return response(['title' => 'Ugurlu!', 'message' => 'BlogCategory ugurlu silindi!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'BlogCategory silmek mumkun olmadi!', 'status' => 'error']);
        }

    }


    public function AddBlogCategory(Request $request)
    {
        $blog_category = BlogCategory::where('name', $request->name)->first();
        if ($blog_category == null) {
            $blog_category = new BlogCategory();
            $blog_category->name = $request->name;
            $blog_category->slug = $request->name;
            $blog_category->status = 1;
            $blog_category->save();
            return response(['title' => 'Ugurlu!', 'message' => 'Yeni Blog Category elave edildi!', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Yeni Blog Category elave etmek mumkun olmadi', 'status' => 'error']);
        }
    }
    // finish BlogCategory


    //BlogComment
    public function BlogCommentDelete(Request $request)
    {
        try {
            BlogComment::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'BlogComment Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'BlogCommenti silmek olmur!', 'status' => 'error']);
        }
    }
    //finish BlogComment

    //Menu

    public function MenuEdit(Request $request)
    {
        try {
            Menu::where('id', $request->id)->update(['name' => $request->name, 'page' => $request->page,
                'slug' => $request->slug, 'status' => $request->status]);
            return response(['title' => 'Ugurlu!', 'message' => 'Menu update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Menu update olmadi', 'status' => 'error']);
        }
    }

    public function MenuDelete(Request $request)
    {
        try {
            Menu::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Menu Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Menu silmek olmur!', 'status' => 'error']);
        }

    }

    //finish Menu

}
