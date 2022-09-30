<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{

    public function Setting(Request $request)
    {
        try {
            Setting::where('id', $request->id)->update(['url' => $request->url, 'title' => $request->title, 'description' => $request->description,
                'description_ru' => $request->description_ru, 'description_en' => $request->description_en, 'keywords' => $request->keywords,
                'author' => $request->author, 'phone' => $request->phone, 'fax' => $request->fax, 'email' => $request->email, 'address' => $request->address,
                'country' => $request->country, 'city' => $request->city, 'maps' => $request->maps, 'analytics' => $request->analytics,
                'facebook' => $request->facebook, 'twitter' => $request->twitter, 'instagram' => $request->instagram, 'youtube' => $request->youtube,
                'whatsapp' => $request->whatsapp, 'google' => $request->google, 'smpt_user' => $request->smpt_user, 'smpt_password' => $request->smpt_password,
                'host' => $request->host, 'port' => $request->port]);
            return response(['title' => 'Ugurlu!', 'message' => 'Setting update oldu', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }


    }

}
