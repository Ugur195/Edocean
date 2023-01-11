<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('backend.admins.index');
    }

    public function getAdmin()
    {
        $admins_project = DB::table('edocean.users')->select(DB::raw("edocean.users.id, edocean.admin.image,
        edocean.users.name as first_name, edocean.admin.last_name,
        edocean.admin.father_name, edocean.admin.birthday,
        edocean.users.email, edocean.users.status as st,
          (CASE edocean.users.status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))
            ->where('edocean.users.author', 1)
            ->leftJoin('edocean.admin', 'edocean.admin.user_id', '=', 'edocean.users.id')
            ->get();
//        dd($admins_project);
        return DataTables::of($admins_project)
            ->editColumn('image', function ($model) {
                return "<img style='display:block;width:80px;height:60px;' src='data:image/jpeg;base64," . base64_encode($model->image) . "'/>";
            })
            ->addColumn('options', function ($model) {
                $return = '<a class="btn btn-xs btn-primary mr-1" href="' . route('admin.admins.edit', $model->id) . '" ><i class="la la-user"></i></a>';
                if ($model->st == 0) {
                    $return .= '<button data-action="' . route('admin.admins.block_unblock', $model->id) . '"
                    onclick="blokUnblok(this,' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-success mr-1"  name="btn_blok"
                                        value="btn_blok" ><i class="la la-check"></i></button>';
                } else if ($model->st == 1) {
                    $return .= '<button  data-action="' . route('admin.admins.block_unblock', $model->id) . '"
                     onclick="blokUnblok(this,' . $model->st . ',' . $model->id . ')"  class="btn btn-xs btn-dark mr-1" name="btn_unblok" value="btn_unblok" ><i class="la la-close"></i></button>';
                }
                $return .= '<button  data-action="' . route('admin.admins.destroy', $model->id) . '"
                 onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger mr-1" ><i class="la la-trash"></i></button>';
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
        $add_admin = User::all();
        return view('backend.admins.create')->with(['add_admin' => $add_admin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $admins_edit = Admin::where('user_id', $id)->first();
        $userEdit = null;
        if ($admins_edit == null) {
            $userEdit = User::find($id);
        } else {
            $userEdit = $admins_edit;
        }
        return view('backend.admins.edit')->with(['admins_edit' => $userEdit]);
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
                $admin_edit->status = 1;
                $admin_edit->save();
            }

            if ($request->first_name !== $userEdit->name) {
                $userEdit->name = $request->first_name;
                $userEdit->save();
            }
            return response(['title' => 'Ugurlu!', 'message' => 'Admin Update oldu!', 'status' => 'success']);
        }catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Admin Update olmadi!'.$exception->getMessage(), 'status' => 'error']);
        }
    }

    public function changeStatus(Request $request)
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
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Admini bloklamaq mumkun olmadi!', 'status' => 'error']);
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
//            dd($request->all());
            User::where('id', $request->id)->delete();
		   Admin::where('user_id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Admin silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Admini silmek mumkun olmadi!', 'status' => 'error']);
        }
    }
}
