<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $menu = Menu::where('status', 1)->get();
        $setting = Setting::find(1);
        return view('frontend.contact_us.index')->with(['menus' => $menu, 'setting' => $setting]);
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
    public function show($id): View
    {
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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Send message by a user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request) {
        try {

            $validate = Validator::make($request->all(), [
                'full_name' => 'required|string',
                'email' => 'required|email|unique:contact_us,email',
                'subject' => 'required|string',
                'message' => 'required|string'
            ]);


            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Melumat gondermek mumkun olmadi', 'status' => 'validation-error',
                    'errors' => $validate->errors()]);
            }
            $contact_us = new ContactUs();
            $contact_us->full_name = $request->full_name;
            $contact_us->subject = $request->subject;
            $contact_us->email = $request->email;
            $contact_us->message = $request->message;
            $contact_us->read_unread = 0;
            $contact_us->status = 1;
            $contact_us->save();
            return response(['title' => 'Ugurlu!', 'message' => 'Mesajiniz gonderildi,tezlikle elaqe saxliyaciyiq!', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesajiniz gonderilmedi!', 'status' => 'error']);
        }
    }
}
