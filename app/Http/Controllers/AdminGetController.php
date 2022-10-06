<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AdminGetController extends Controller
{
    public function home()
    {
        return view('backend.index');
    }

    public function ContactUs()
    {
        return view('backend.contact_us');
    }

    public function Setting()
    {
        $setting = Setting::find(1);
        return view('backend.setting')->with(['setting' => $setting]);
    }

    public function AboutUs()
    {
        $about_us = AboutUs::find(1);
        return view('backend.about_us')->with(['about_us' => $about_us]);
    }

    public function MessagesEdit($id)
    {
        $contact_us = ContactUs::all();
        $messages_edit = ContactUs::where('id', $id)->first();
        return view('backend.messages_edit')->with(['contact_us' => $contact_us, 'messages_edit' => $messages_edit]);
    }


    public function getContactUs()
    {
        $contact_us = DB::table('edocean.contact_us')->select(DB::raw("id, full_name, subject, message, email,
        (CASE read_unread WHEN  0 then 'Oxunmayib' WHEN 1 then 'Oxunub' END) as read_unread,
        (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
        return DataTables::of($contact_us)
            ->addColumn('options', function ($model) {
                return '<a class="btn btn-xs btn-primary" href=""><i class="la la-reply"></i></a>
			    	<button onclick="sil(this,{{})"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
            })->rawColumns(['options' => true])->make(true);
    }


}
