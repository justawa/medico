<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewUser;
use App\Models\User;



class NewUserController extends Controller
{
    public function index(){
        return view("user.newuser");
    }
    public function store(Request $req, User $user ){

        $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->type = "student";
            $user->save();
            return redirect()->back()->with('status','User Added Successfully');

    }
}
