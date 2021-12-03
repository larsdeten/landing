<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        if(request()->segment(1) != 'admin' && request()->segment(1) != 'login'){
            $data = (new ApiController)->set(request()->path());
            return view('pages.index');
        }

    }

    public function page()
    {
        if(request()->segment(1) != 'admin' && request()->segment(1) != 'login'){
            $data = (new ApiController)->set(request()->path());
            return view('pages.index');
        }

    }

}
