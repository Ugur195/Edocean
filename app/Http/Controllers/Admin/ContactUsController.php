<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;


class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('backend.contact_us.index');
    }

    public function getContactUs()
    {
      $contact_us = DB::table('edocean.contact_us')->select(DB::raw("id, full_name, subject, message, email,
        (CASE read_unread WHEN  0 then 'Oxunmayib' WHEN 1 then 'Oxunub' END) as read_unread,
       (CASE status WHEN 0 then 'Deaktiv' WHEN 1 then 'Aktiv' END) as status"))->get();
       return DataTables::of($contact_us)
           ->addColumn('options', function ($model) {
               return
                    '<a class="btn btn-xs btn-primary" href="' . route('admin.contact_us.edit', $model->id) . '" ><i class="la la-pencil-square-o"></i></a>
		    	<button data-action="'.route('admin.contact_us.destroy', $model->id).'" onclick="sil(this,' . $model->id . ')"  class="btn btn-xs btn-danger" ><i class="la la-trash"></i></button>';
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
        $contact_us = ContactUs::all();
        $messages_edit = ContactUs::where('id', $id)->first();
        if ($messages_edit->read_unread == 0) {
            ContactUs::where('id', $id)->update(['read_unread' => 1]);
        }
        return view('backend.contact_us.edit')->with(['contact_us' => $contact_us, 'messages_edit' => $messages_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Mail $mail,Request $request)
    {
        try {
            $mail::send('emails.mesaj_gonder', ['msg' => 'Answer: ' . $request->answer], function ($message) use ($request) {
                $message->to($request->email, $request->full_name)->subject('Mail linki');
                $message->from('edocean_course@mail.ru', 'Edocean Course');
            });
           return response(['title' => 'Ugurlu!', 'message' => 'Mesajiniz gonderildi!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesajinizi gondermek mumkun olmadi', 'status' => 'error']);
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
            ContactUs::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Mesaj Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesaji silmek olmur!', 'status' => 'error']);
        }
    }
}
