<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxTestController extends Controller
{
    public function test(Request $request){
        return $request->all();
    }
}