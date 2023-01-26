<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('backend.students.index');
    }

    public function getStudent()
    {
        $student = DB::table('edocean.student')->select(DB::raw("edocean.users.name as username, edocean.student.id,
         edocean.student.image, edocean.student.user_id, edocean.student.surname, edocean.users.email, edocean.student.gender,
        edocean.student.phone, edocean.student.parent, edocean.student.payment, edocean.student.balance, edocean.student.status as st,
          (CASE edocean.student.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->leftJoin('edocean.users', 'edocean.users.id', '=', 'edocean.student.user_id')
            ->get();
        return DataTables::of($student)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.students.edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button data-action="' . route('admin.students.update', $model->id) . '" onclick="blokUnblok(this,' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button data-action="' . route('admin.students.update', $model->id) . '"  onclick="blokUnblok(this,' . $model->st . ',' . $model->user_id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok"  value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button  data-action="' . route('admin.students.destroy', $model->id) . '" onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mt-1" ><i class="la la-trash"></i></button>';
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
        $student_edit = Student::where('id', $id)->first();
        return view('backend.students.edit')->with(['student_edit' => $student_edit]);
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
                    Student::where('user_id', $request->id)->update(['status' => 1]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student blokdan cixdi!', 'status' => 'success']);
                } else if ($request->status == 1) {
                    User::where('id', $request->id)->update(['status' => 0]);
                    Student::where('user_id', $request->id)->update(['status' => 0]);
                    return response(['title' => 'Ugurlu!', 'message' => 'Student bloklandi!', 'status' => 'success']);
                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Studenti bloklamaq mumkun olmadi!', 'status' => 'error']);
                }
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Studenti bloklamaq mumkun olmadi!', 'status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $student->user()->delete();
            $student->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Student ugurlu Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Student silmek olmur!', 'status' => 'error']);
        }
    }
}
