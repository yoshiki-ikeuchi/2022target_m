<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    public static function getusers()
    {
        $users = DB::table('users')->get();
        return $users;
    }
    
    public static function getselectusers($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        return $users;
    }
    
    public static function userupdate($param)
    {
        $updatecolumns = array();
        if(isset($param["name"]) && $param["name"] != ""){
            $updatecolumns["name"] = $param["name"];
        }
        if(isset($param["password"]) && $param["password"] != ""){
            $updatecolumns["password"] = Hash::make($param["password"]);
        }
        $updatecolumns["authority"] = !empty($param["authority"]) ? 1 : 0;

        if(!empty($updatecolumns)){
            // 更新やってみる
            DB::table('users')->where('id', $param["id"])->update($updatecolumns);
        }
    }
}
