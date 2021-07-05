<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Detail;
use App\Models\Package;

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

	public function edit( Request $req, User $user)
    {
        $userId = $user->id;
        $detail = detail::select('*')->where('user_id', $userId)->get();
        $packages = Package::get();
         return view('user.edit')->with(compact('detail', $detail))->with(compact('user',$user))->with(compact('packages',$packages));
    }

    
 
    public function store(Request $req, User $user)
    {
        $details = new Detail;
    
        $details->phone = $req->mobile;
        $details->gender = $req->gender;
        $details->qualification = $req->qualification;
        $details->address = $req->address;
        $details->city = $req->city;
        $details->state = $req->state;
        $details->country = $req->country;
        $details->zipcode = $req->zipcode;
        $details->user_id = $req->id;
        $details->save();

        $packageUser =  User::find($details->user_id);
        $packages = $req->package;
        $itemCount = count($packages);
        for($i=0; $i<$itemCount; $i++) {
            $packageUser->packages()->attach($packages[$i]);
        }

        return redirect('users');
    }

   /* public function add(Request $req)
	{
        
        $data= detail::join('users', 'Users.id', '=', 'details.user_id')
        ->select('details.*','users.*')->get();
        
        dd($data);
		
	}*/


}
