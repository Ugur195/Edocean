<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('backend.menus.index');
    }

    public function getMenu()
    {
        $menu = DB::table('edocean.menu')->select(DB::raw("id, name, page, slug,created_at,updated_at,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($menu)
            ->addColumn('options', function ($model) {
                return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.menus.edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
			    	<button data-action="'.route('admin.menus.destroy', $model->id).'" onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('backend.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //добавить меню
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id):View
    {
//        $menu_edit = Menu::find($id);
//        return view('backend.menus.edit')->with(['menu_edit' => $menu_edit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id):View
    {
        $menu_edit = Menu::find($id);
        return view('backend.menus.edit')->with(['menu_edit' => $menu_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu, Request $request)
    {
        try {
//            dd($request->all());
            $menu->update(['name' => $request->name, 'page' => $request->page,
                'slug' => $request->slug, 'status' => $request->status]);
            return response(['title' => 'Ugurlu!', 'message' => 'Menu update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Menu update olmadi'.$exception->getMessage(), 'status' => 'error']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Menu::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Menu Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Menu silmek olmur!', 'status' => 'error']);
        }
    }
}
