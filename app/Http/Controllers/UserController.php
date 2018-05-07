<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function userinfo(){
        $user = User::find(Auth::user()->id);
        return view('layouts.edituser')->with('user',$user);
    }

    public function saveuser(Request $request){
        $data = $request->all();
        $user = User::find(Auth::user()->id);
        if(isset($data['pwd']) && isset($data['cfnewpwd']) && isset($data['newpwd'])
            && ($data['newpwd']==$data['cfnewpwd']) && Hash::check($data['pwd'],Auth::user()->password)){
            $user->password = Hash::make($data['newpwd']);
        }
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->update();
        return redirect('userlist');
    }
}
