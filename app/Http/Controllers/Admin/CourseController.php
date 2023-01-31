<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('backend.courses.index');
    }

    public function getCourse()
    {
        $course = DB::table('edocean.course')->select(DB::raw("edocean.users.name as username,
        edocean.subject_category.name as category_name,edocean.subjects.name as subject_name, edocean.course.id,
         edocean.course.image, edocean.course.user_id, edocean.users.email, edocean.course.phone, edocean.course.subjects_category,
         edocean.course.subjects, edocean.course.lesson_cost, edocean.course.balance,
          edocean.course.status as st,
         (CASE edocean.course.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.users', 'edocean.users.id', '=', 'edocean.course.user_id')
            ->leftJoin('edocean.subject_category', 'edocean.subject_category.id', '=', 'edocean.course.subjects_category')
            ->leftJoin('edocean.subjects', 'edocean.subjects.id', '=', 'edocean.course.subjects')
            ->get();
        return DataTables::of($course)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.courses.edit', $model->id) . '" ><i class="la la-info"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button  data-action="' . route('admin.courses.update', $model->id) . '" onclick="blokUnblok(this,' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button  data-action="' . route('admin.courses.update', $model->id) . '"  onclick="blokUnblok(this,' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button  data-action="' . route('admin.courses.destroy', $model->id) . '" onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mt-1" ><i class="la la-trash"></i></button>';
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
        $course_edit = Course::find($id);
        return view('backend.courses.edit')->with(['course_edit' => $course_edit]);
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
                    return response(['title' => 'Ugursuz!', 'message' => 'Course bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Course bloklamaq mumkun olmadi!', 'status' => 'error']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        try {
            $course->user()->delete();
            $course->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Course ugurlu Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Course silmek olmur!', 'status' => 'error']);
        }
    }
}
