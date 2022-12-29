<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $setting = Setting::find(1);
        return view('backend.setting.index')->with(['setting' => $setting]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Setting $setting,Request $request)
    {
        try {
            $setting::where('id', $request->id)->update(['url' => $request->url, 'title' => $request->title, 'description' => $request->description,
                'description_ru' => $request->description_ru, 'description_en' => $request->description_en, 'keywords' => $request->keywords,
                'author' => $request->author, 'phone' => $request->phone, 'fax' => $request->fax, 'email' => $request->email, 'address' => $request->address,
                'country' => $request->country, 'city' => $request->city, 'maps' => $request->maps, 'analytics' => $request->analytics,
                'facebook' => $request->facebook, 'twitter' => $request->twitter, 'instagram' => $request->instagram, 'youtube' => $request->youtube, 'whatsapp' => $request->whatsapp, 'google' => $request->google, 'smpt_user' => $request->smpt_user, 'smpt_password' => $request->smpt_password,
                'host' => $request->host, 'port' => $request->port]);
            if (isset($request->logo)) {
                Setting::where('id', $request->id)->update(['logo' => file_get_contents($request->file('logo'))]);
            }
            return response(['title' => 'Ugurlu!', 'message' => 'Setting update oldu', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }
    }


/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public
function destroy($id)
{
    //
}
}
