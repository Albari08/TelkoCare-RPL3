<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        //return $request->input();
        //validate
        $request->validate([
            'user_id'=>'required',
            'user_pass'=>'required|min:4|max:16',
            'user_pass_chk'=>'required|min:4|max:16',
            'email'=>'required|email',
        ]);

            //insert data
        $user = new Users;
        $user->user_id = $request->user_id;
        $user->user_pass = Hash::make($request->user_pass);        
        $user->email = $request->email;
        $user-≥save();
    }
}