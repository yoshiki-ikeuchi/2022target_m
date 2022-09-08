<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library\Users;

class UsersController extends Controller
{
    public function default(Request $request)
    {
        $userdata = Users::getusers();
        return view('users', ['userdata' => $userdata]);
    }

    public function window(Request $request)
    {
        $userdata = Users::getselectusers($request->get("id"));
        return view('usersupdate', ['userdata' => $userdata]);
    }

    public function update(Request $request)
    {
        Users::userupdate($request->all());
        return redirect()->route('users');
    }

}
