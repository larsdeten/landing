<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $cookie = Str::random(36);
        if (request()->cookie('tldst') === null) {
            Cookie::queue('tldst', $cookie, 999999999);
        }
        $visitorId = !is_null(request()->cookie('tldst')) ? request()->cookie('tldst') : $cookie;
        $path = request()->path();
        $params = [
            'url' => $path,
            'v_id' => $visitorId
        ];
        if(request()->segment(1) != 'admin' && request()->segment(1) != 'login'){
            $data = (new ApiController)->set($params);
            return view('pages.index');
        }

    }

    public function page(Request $request)
    {
        $cookie = Str::random(36);
        if (request()->cookie('tldst') === null) {
            Cookie::queue('tldst', $cookie, 999999999);
        }
        $visitorId = !is_null(request()->cookie('tldst')) ? request()->cookie('tldst') : $cookie;
        $path = request()->path();
        $params = [
            'url' => $path,
            'v_id' => $visitorId
        ];
        if(request()->segment(1) != 'admin' && request()->segment(1) != 'login'){
            $data = (new ApiController)->set($params);
            return view('pages.index');
        }

    }

}
