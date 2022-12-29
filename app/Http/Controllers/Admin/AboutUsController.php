<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $about_us = AboutUs::find(1);
        return view('backend.about_us.index')->with(['about_us' => $about_us]);
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
    public function update(Request $request)
    {
        try {
            AboutUs::where('id', $request->id)->update(['our_responsib' => $request->our_responsib, 'our_responsib_ru' => $request->our_responsib_ru,
                'our_responsib_en' => $request->our_responsib_en, 'content_az' => $request->content_az, 'content_ru' => $request->content_ru, 'content_en' =>
                    $request->content_en, 'video_link' => $request->video_link, 'video_sub_title' => $request->video_sub_title, 'video_sub_title_ru' => $request->
                video_sub_title_ru, 'video_sub_title_en' => $request->video_sub_title_en, 'our_purpose' => $request->our_purpose,
                'our_purpose_ru' => $request->our_purpose_ru, 'our_purpose_en' => $request->our_purpose_en]);
            return response(['title' => 'Ugurlu!', 'message' => 'About Us update oldu', 'status' => 'success']);

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
    public function destroy($id)
    {
        //
    }
}
