<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Blogs;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use PharIo\Version\Exception;

class AdminPostController extends Controller
{
    //Student
    public function StudentsBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Student::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Student::where('user_id', $request->id)->update(['status' => 0]);
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
    public function CoursesBlockUnblockDelete(Request $request)
    {
        try {
            if ($request->btn_block != null) {
                if ($request->status == 0) {
                    User::where('id', $request->id)->update(['status' => 1]);
                    Course::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Course blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Course::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Course bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Coursu bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                User::where('id', $request->id)->delete();
                Course::where('user_id', $request->id)->delete();
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

        if ($request->first_name !== $userEdit->name) {
            $userEdit->name = $request->first_name;
            $userEdit->save();
        }
        return response(['title' => 'Ugurlu!', 'message' => 'Yeni Blog elave edildi!', 'status' => 'success']);
    }
    //finish Admin


    //Blogs


//    public function BlogsAdd(Request $request)
//    {
//        $sekiller = $request->file('image');
//        $prod_image = '';
//        if (!empty($sekiller)) {
//            $i = 0;
//            foreach ($sekiller as $sk) {
//                $sekil_uzanti = $sk->getClientOriginalExtension();
//                $sekil_ad = $i . '.' . $sekil_uzanti;
//                Storage::disk('uploads')->makeDirectory('blogs/');
//                $image = Image::make($sk->getRealPath())->resize(320, 220)->save('uploads/blogs/' . $sekil_ad);
//                Storage::disk('uploads')->deleteDirectory('blogs');
//                $prod_image = $prod_image . $image . '(xx)';
//                $i++;
//            }
//        }
//
//        $blogs = Blogs::where('title', $request->title)->first();
//        if ($blogs == null) {
//            $blogs = new Blogs();
//            $blogs->image = $prod_image;
//            $blogs->title = $request->title;
//            $blogs->title_ru = $request->title_ru;
//            $blogs->title_en = $request->title_en;
//            $blogs->message = $request->message;
//            $blogs->message_ru = $request->message_ru;
//            $blogs->message_en = $request->message_en;
//            $blogs->author = Auth::user()->id;
//            $blogs->category_id = $request->blog_category;
//            $blogs->slug = $request->title;
//            $blogs->status = 1;
//            $blogs->likes = 0;
//            $blogs->dislike = 0;
//            $blogs->see_count = 0;
//            $blogs->save();
//            return response(['title' => 'Ugurlu!', 'message' => 'Yeni Blog elave edildi!', 'status' => 'success']);
//        } else {
//            return response(['title' => 'Ugursuz!', 'message' => 'Yeni Blog elave etmek mumkun olmadi' , 'status' => 'error']);
//        }
//    }
//
//    public function BlogsEdit(Request $request, $id)
//    {
//        try {
//            $blog = Blogs::find($id);
//            $image = $request->file('image');
//            $edit_blog_image = $blog->image;
//
//
//            if (!empty($image)) {
//                $i=0;
//                foreach ($image as $img) {
//                    $sekil_uzanti = $img->getClientOriginalExtension();
//                    $sekil_ad = $i . '.' . $sekil_uzanti;
//                    Storage::disk('uploads')->makeDirectory('blogsEdit/');
//                    $image2 = Image::make($img->getRealPath())->resize(320, 220)->save('uploads/blogsEdit/' . $sekil_ad);
//                    Storage::disk('uploads')->deleteDirectory('blogsEdit');
//                    $edit_blog_image = $edit_blog_image . $image2 . '(xx)';
//                    $i++;
//                }
//                $blog->update(['title' => $request->title, 'title_ru' => $request->title_ru,
//                    'title_en' => $request->title_en, 'message' => $request->message, 'message_ru' => $request->message_ru,
//                    'message_en' => $request->message_en, 'author' => Auth::user()->id, 'category_id' => $request->category_id,
//                    'slug' => $request->title, 'status' => $request->status, 'image' => $edit_blog_image]);
//            } else {
//                $blog->update(['title' => $request->title, 'title_ru' => $request->title_ru,
//                    'title_en' => $request->title_en, 'message' => $request->message, 'message_ru' => $request->message_ru,
//                    'message_en' => $request->message_en, 'author' => Auth::user()->id, 'category_id' => $request->category_id,
//                    'slug' => $request->title, 'status' => $request->status]);
//            }
//            return response(['title' => 'Ugurlu!', 'message' => 'Blog update oldu', 'status' => 'success']);
//        } catch (\Exception $exception) {
//            return response(['title' => 'Ugursuz!', 'message' => 'Blog update mumkun olmadi' . $exception->getMessage(), 'status' => 'error']);
//        }
//    }
//
//
//    public function BlogsImageDelete(Request $request)
//    {
//        try {
//            $blogs_image = Blogs::find($request->id);
//            $image_name = '';
//            $count_image = 0;
//            foreach (explode('(xx)', $blogs_image->image) as $im) {
//                if ($im != '') {
//                    $count_image++;
//                }
//            }
//            if ($count_image > 1) {
//                foreach (explode('(xx)', $blogs_image->image) as $image) {
//                    if (base64_encode($image) != $request->image_name) {
//                        $image_name = $image_name . $image . '(xx)';
//                    }
//                }
//            } else {
//                $image_name = null;
//            }
//            $blogs_image->image = $image_name;
//            $blogs_image->save();
//            return response(['title' => 'Uğurlu!', 'message' => 'Şəkil uğurla silindi', 'status' => 'success']);
//        } catch (\Exception $exception) {
//            return response(['title' => 'Uğursuz!', 'message' => 'Şəkili silmək mümkün olmadı! Yenidən cəhd edin', 'status' => 'error']);
//        }
//    }
//
//
//    public function BlogsBlockUnblockDelete(Request $request)
//    {
//        try {
//            if ($request->btn_block != null) {
//                if ($request->status == 0) {
//                    Blogs::find($request->id)->update(['status' => 1]);
//                    return response(['title' => 'Ugurlu!', 'message' => 'Blogs blokdan cixdi!', 'status' => 'success']);
//                } else if ($request->status == 1) {
//                    Blogs::find($request->id)->update(['status' => 0]);
//                    return response(['title' => 'Ugurlu!', 'message' => 'Blogs bloklandi!', 'status' => 'success']);
//                } else {
//                    return response(['title' => 'Ugursuz!', 'message' => 'Blogsi bloklamaq mumkun olmadi!', 'status' => 'error']);
//                }
//            } else if ($request->btn_delete != null) {
//                Blogs::where('id', $request->id)->delete();
//                BlogComment::where('blog_id', $request->id)->delete();
//                return response(['title' => 'Ugurlu!', 'message' => 'Blogs ugurlu silindi!', 'status' => 'success']);
//            } else {
//                return response(['title' => 'Ugursuz!', 'message' => 'Blogsi silmek mumkun olmadi!', 'status' => 'error']);
//            }
//        } catch (\Exception $exception) {
//            return response(['title' => 'Ugursuz!', 'message' => 'Blogsi silmek olmur!', 'status' => 'error']);
//        }
//    }
//    //finish Blogs


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
    public function BlogCommentPublishUnpublishDelete(Request $request)
    {
        try {
            if ($request->btn_publish != null) {
                if ($request->status == 0) {
                    BlogComment::find($request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Reyiniz Yayimlandi', 'status' => 'success']);
                } else if ($request->status == 1) {
                    BlogComment::find($request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Reyiniz Saytda artiq yayinlanmir', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Blogsi bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            } else if ($request->btn_delete != null) {
                BlogComment::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'BlogComment Silindi', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'BlogCommenti silmek olmur!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'BlogsCommenti silmek olmur!', 'status' => 'error']);
        }
    }
    //finish BlogComment


}
