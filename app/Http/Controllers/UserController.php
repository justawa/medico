<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Detail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'student')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return $this->edit(new User());
    }

	public function edit(User $user)
    {
        // dd($user);
        $userId = $user->id;

        $detail = detail::select('*')->where('user_id', $userId)->get();
        // dd($detail);
        //return view('edit', compact('user', 'detail'));
        return view('user.edit', compact('detail'))->withUser($user);
        // return view('user.edit')->with(compact('detail', $detail))->with(compact('user',$user));
        
            
    }
 
    public function store(Request $req)
    {
        $details = new detail;
        
        $details->Phone = $req->mobile;
        $details->Gender = $req->gender;
        $details->Qualification = $req->qualification;
        $details->Address = $req->address;
        $details->City = $req->city;
        $details->state = $req->state;
        $details->Country = $req->country;
        $details->Zipcode = $req->zipcode;
        $details->Password = $req->pass;
        $details->user_id = $req->id;
        $details->save();

        return redirect('users');


    }

   /* public function store(Request $req)
	{
        
        $data= detail::join('users', 'Users.id', '=', 'details.user_id')
        ->select('details.*','users.*')->get();
        
        dd($data);
		
	}*/


}
