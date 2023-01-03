<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        return view('backend.blogs.index');
    }

    public function getBlogs()
    {
//        dd(User::find(55));
        $blogs = DB::table('edocean.blogs')->select(DB::raw("edocean.users.name as username, edocean.blog_category.name as bg_name,
         edocean.blogs.id, edocean.blogs.image,edocean.blogs.title,
        edocean.blogs.message,edocean.blogs.author,edocean.blogs.category_id,edocean.blogs.likes,edocean.blogs.dislike,edocean.blogs.see_count,
         edocean.blogs.status as st,
        (CASE edocean.blogs.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.users', 'edocean.users.id', '=', 'edocean.blogs.author')
            ->leftJoin('edocean.blog_category', 'edocean.blog_category.id', '=', 'edocean.blogs.category_id')
            ->get();
//        dd($blogs);
        return DataTables::of($blogs)
            ->editColumn('image', function ($model) {
                $html = '';
                foreach (explode('(xx)', $model->image) as $key => $image) {
                    if ($image != '') {
                        $html .= '<div class="carousel-item ' . ($key == 0 ? 'active' : '') . '">
                 <img style="display:block;width:100px;height:60px;" class="d-block w-100" src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="First slide">
                  </div>';
                    }
                }
                return '<div id="carouselExampleControls' . $model->id . '" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">' . $html . '</div>
                 <a class="carousel-control-prev" href="#carouselExampleControls' . $model->id . '" role="button" data-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
                 </a>
                 <a class="carousel-control-next" href="#carouselExampleControls' . $model->id . '" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                 </a>
                 </div>';
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.blogs.edit', $model->id) . '" ><i class="la la-info"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button  onclick="blokUnblok(' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button data-action="' . route('admin.blogs.block_unblock_delete', $model->id) . '" onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $blogs = Blogs::all();
        $blog_category = BlogCategory::where('status', 1)->get();
        return view('backend.blogs.create')->with(['blog_category' => $blog_category, 'blogs' => $blogs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sekiller = $request->file('image');
        $prod_image = '';
        if (!empty($sekiller)) {
            $i = 0;
            foreach ($sekiller as $sk) {
                $sekil_uzanti = $sk->getClientOriginalExtension();
                $sekil_ad = $i . '.' . $sekil_uzanti;
                Storage::disk('uploads')->makeDirectory('blogs/');
                $image = Image::make($sk->getRealPath())->resize(320, 220)->save('uploads/blogs/' . $sekil_ad);
                Storage::disk('uploads')->deleteDirectory('blogs');
                $prod_image = $prod_image . $image . '(xx)';
                $i++;
            }
        }

        $blogs = Blogs::where('title', $request->title)->first();
        if ($blogs == null) {
            $blogs = new Blogs();
            $blogs->image = $prod_image;
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id):View
    {
        $blog_category = BlogCategory::all();
        $blogs_edit = Blogs::where('id', $id)->first();
        return view('backend.blogs.edit')->with(['blogs_edit' => $blogs_edit, 'blog_category' => $blog_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $blog = Blogs::find($id);
            $image = $request->file('image');
            $edit_blog_image = $blog->image;


            if (!empty($image)) {
                $i=0;
                foreach ($image as $img) {
                    $sekil_uzanti = $img->getClientOriginalExtension();
                    $sekil_ad = $i . '.' . $sekil_uzanti;
                    Storage::disk('uploads')->makeDirectory('blogsEdit/');
                    $image2 = Image::make($img->getRealPath())->resize(320, 220)->save('uploads/blogsEdit/' . $sekil_ad);
                    Storage::disk('uploads')->deleteDirectory('blogsEdit');
                    $edit_blog_image = $edit_blog_image . $image2 . '(xx)';
                    $i++;
                }
                $blog->update(['title' => $request->title, 'title_ru' => $request->title_ru,
                    'title_en' => $request->title_en, 'message' => $request->message, 'message_ru' => $request->message_ru,
                    'message_en' => $request->message_en, 'author' => Auth::user()->id, 'category_id' => $request->category_id,
                    'slug' => $request->title, 'status' => $request->status, 'image' => $edit_blog_image]);
            } else {
                $blog->update(['title' => $request->title, 'title_ru' => $request->title_ru,
                    'title_en' => $request->title_en, 'message' => $request->message, 'message_ru' => $request->message_ru,
                    'message_en' => $request->message_en, 'author' => Auth::user()->id, 'category_id' => $request->category_id,
                    'slug' => $request->title, 'status' => $request->status]);
            }
            return response(['title' => 'Ugurlu!', 'message' => 'Blog update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Blog update mumkun olmadi' . $exception->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
