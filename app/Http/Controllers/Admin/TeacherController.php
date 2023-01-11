<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('backend.teachers.index');
    }


    public function getTeacher()
    {
        $teacher = DB::table('edocean.teacher')->select(DB::raw("id,user_id,image,name,surname,gender,email,phone,subjects,lesson_price,balance,status as st,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();

        return DataTables::of($teacher)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mt-1" href="' . route('admin.teachers.edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button  data-action="' . route('admin.teachers.update', $model->id) . '" onclick="blokUnblok(this,' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-success mt-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button  data-action="' . route('admin.teachers.update', $model->id) . '" onclick="blokUnblok(this,' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-dark mt-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button  data-action="' . route('admin.teachers.destroy', $model->id) . '" onclick="sil(this)"  class="btn btn-xs btn-danger mt-1"   ><i class="la la-trash"></i></button>';
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
        $teacher_edit = Teacher::find($id);
        return view('backend.teachers.edit')->with(['teacher_edit' => $teacher_edit]);
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
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Teacheri bloklamaq mumkun olmadi!', 'status' => 'error']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->user()->delete();
            $teacher->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Teacher ugurlu Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Teacher silmek olmur!', 'status' => 'error']);
        }
    }
}
