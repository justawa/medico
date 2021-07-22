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

	public function edit(User $user)
    {
        $user_id = $user->id;
        $detail = Detail::where('user_id',$user_id)->first();
        //$detail = Detail::select('phone','gender','qualification','address','city','state','country','zipcode','user_id')->where('user_id', $userId)->first();
        $packages = Package::get();
         return view('user.edit')->with('detail',$detail)->with('user',$user)->with('packages',$packages);
         //->with(compact('details', $details))->with(compact('user',$user))->with(compact('packages',$packages));
    }

    
 
    public function store(Request $req, User $user)
    {   
        $detail = Detail::find($user);
        $detail = Detail::where('user_id',$user->id)->first();
      //  $detail = new Detail;
    
        $detail->phone = $req->phone;
        $detail->gender = $req->gender;
        $detail->qualification = $req->qualification;
        $detail->address = $req->address;
        $detail->city = $req->city;
        $detail->state = $req->state;
        $detail->country = $req->country;
        $detail->zipcode = $req->zipcode;
        $detail->user_id = $req->id;
        $detail->save();

        $packageUser =  User::find($detail->user_id);
       // dd($packageUser);
       $pack = Package::select('id')->where('id' ,'>' ,0)->get();
    
       $allpack = array();
       //dd($pack);
       $i=0;
       foreach($pack as $p)
       {
          $allpack[$i] = $p->id;
          $packageUser->packages()->detach($p->id);
          $i++;
       }
       //print_r($allpack);
        $packages = $req->package;
       //print_r($packages);

        $itemCount = count(array($packages));
        //dd($itemCount);
        for($i=0; $i<$itemCount; $i++) {
            $packageUser->packages()->attach($packages[$i]);
        }
       /* $newSelectedPackage = array_diff($allpack, $packages);
        
        $detachPackage = array();
        $j = 0;
        foreach($newSelectedPackage as $index=>$value){
            $detachPackage[$j] = $value;
            $j++;
        }
    
        $countItem = count($detachPackage);
        for($i=0; $i < $countItem; $i++){
            $packageUser->packages()->detach($detachPackage[$i]);
            
        }*/
        return redirect('users');
    }

   /* public function add(Request $req)
	{
        
        $data= detail::join('users', 'Users.id', '=', 'details.user_id')
        ->select('details.*','users.*')->get();
        
        dd($data);
		
	}*/

    

}
