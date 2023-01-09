<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('backend.blogs.blog_categories.index');
    }


    public function blogCategory()
    {
        $blog_categories = DB::table('edocean.blog_category')->select(DB::raw("id, name, slug,created_at,updated_at,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($blog_categories)
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.blog_categories.edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
			    	<button data-action="' . route('admin.blog_categories.destroy', $model->id) . '" onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('backend.blogs.blog_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function edit($id): View
    {
        $blog_category_edit = BlogCategory::where('id', $id)->first();
        return view('backend.blogs.blog_categories.edit')->with(['blog_category_edit' => $blog_category_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategory $blogCategory, Request $request)
    {
        try {
//            dd($request->all());
            $blogCategory->update(['name' => $request->name,
                'slug' => $request->slug, 'status' => $request->status]);
            return response(['title' => 'Ugurlu!', 'message' => 'BlogCategory update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'BlogCategory update olmadi', 'status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
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
}
