<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Blogs;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        $blogs = Blogs::with('admin')->where('status', 1)->get();
        $blog_category = BlogCategory::all();
        return view('frontend.blogs.index')->with(['menus' => $menu, 'setting' => $setting, 'blogs' => $blogs,
            'blog_category' => $blog_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id):View
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $blogs_id = Blogs::find($id);
        $blogs = Blogs::with('admin')->get();
        $blog_category = BlogCategory::all();
        $about_us = AboutUs::all();
        $blogs_comments = BlogComment::where(['blog_id' => $blogs_id->id, 'status' => 1])->get();
        return view('frontend.blogs.edit')->with(['menus' => $menu, 'blogs' => $blogs, 'setting' => $setting,
            'blog_category' => $blog_category, 'about_us' => $about_us, 'blogs_id' => $blogs_id, 'blogs_comments' => $blogs_comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $blogs_comments = new BlogComment();
            if (Auth::check()) {
                $blogs_comments->name = Auth::user()->name;
                $blogs_comments->email = Auth::user()->email;
                $blogs_comments->user_id = Auth::user()->id;
            } else {
                $blogs_comments->name = $request->name;
                $blogs_comments->email = $request->email;
                $blogs_comments->user_id = 0;
            }

            if ($request->parent_id != null) {
                $blogs_comments->parent_id = $request->parent_id;
            } else {
                $blogs_comments->parent_id = 0;
            }

            $blogs_comments->message = $request->comment;
            $blogs_comments->blog_id = $id;
            $blogs_comments->status = 0;
            $blogs_comments->save();

            return response(['title' => 'Ugurlu', 'message' => 'Reyiniz gonderildi,admin terefinden tesdiqlikden sonra yayinlanacaq!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Reyiniz gonderilmedi!', 'status' => 'error']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
