<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BlogCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('backend.blogs.blog_comments.index');
    }

    public function blogComment()
    {
        $blog_comment = DB::table('edocean.blog_comment')->select(DB::raw("edocean.blogs.title as title_name,
        edocean.blog_comment.id, edocean.blog_comment.name,
		edocean.blog_comment.email, edocean.blog_comment.message, edocean.blog_comment.blog_id,
		 edocean.blog_comment.parent_id,edocean.blog_comment.status as st,
        (CASE edocean.blog_comment.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.blogs', 'edocean.blogs.id', '=', 'edocean.blog_comment.blog_id')
            ->get();
        return DataTables::of($blog_comment)
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.blog_comments.edit', $model->id) . '" ><i class="la la-info"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button data-action="' . route('admin.blog_comments.update', $model->id) . '"
                     onclick="publishUnpublish(this,' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_publish"
                                        value="btn_publish" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button data-action="' . route('admin.blog_comments.update', $model->id) . '"
                     onclick="publishUnpublish(this,' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unpublish"  value="btn_unpublish" ><i class="la la-close"></i></button>';
                }
                $return .= '<button data-action="' . route('admin.blog_comments.destroy', $model->id) . '" onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
                return $return;
            })->rawColumns(['options' => true])->make(true);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $blog_comment_edit = BlogComment::where('id', $id)->first();
        return view('backend.blogs.blog_comments.edit')->with(['blog_comment_edit' => $blog_comment_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'BlogsCommenti silmek olmur!', 'status' => 'error']);
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
            BlogComment::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'BlogComment Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {

            return response(['title' => 'Ugursuz!', 'message' => 'BlogCommenti silmek olmur!', 'status' => 'error']);
        }
    }
}
