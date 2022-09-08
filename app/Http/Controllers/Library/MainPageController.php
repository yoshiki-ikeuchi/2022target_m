<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class MainPageController extends Controller
{
    public function default(Request $request)
    {
        $ttt = "hoge";
        return view('mainpage', ['ttt' => $ttt]);
    }
}
