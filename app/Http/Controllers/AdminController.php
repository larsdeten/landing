<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $num = request()->segment(2) ?? 0;
        $params = [
            'num' => $num,
        ];
        if(request()->segment(1) == 'admin'){

            $data = (new ApiController)->get($params);
            $count = (int) round(($data['count'] / 5), 0);
            $counter = [];
            for($i = 0; $i < $count; $i++){
                $counter[$i] = $i;
            }
            if(Auth::check()){
                return view('admin.index', [
                    'datas' => $data['data'],
                    'count' => $counter
                ]);
            }
            return Redirect::route('login');
        }
    }
}
