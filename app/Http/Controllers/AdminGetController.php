<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminGetController extends Controller
{
    public function home()
    {
        return view('backend.index');
    }
}
