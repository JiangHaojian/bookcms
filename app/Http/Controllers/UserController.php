<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlist(){
        $users = User::all();
        return view('layouts.userlist')->with('users',$users);
    }

    public function uplevel($id){
        $user = User::find($id);
        $user->type = 1;
        $user->update();
        return redirect('userlist');
    }

    public function downlevel($id){
        $user = User::find($id);
        $user->type = 2;
        $user->update();
        return redirect('userlist');
    }
}
