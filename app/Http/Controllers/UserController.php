<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Detail;
use App\Models\Package;
// use App\Models\package_user;
use App\Models\package_user;

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



    public function progress(package_user $req ,User $user, Package $package)
    {   
        $user_id = $user->id;
        $detail = Detail::where('user_id',$user_id)->first();
        $package = Package::get();
      
        $progress=array();
        $pro=array();
        $a=0;

        foreach($package as $pkg) {
            // echo $pkg->id;
            // echo $pkg->user_id;
            // echo $pkg->name;
            // $pro[$a] =array(  $pkg->user_id ,  $pkg->name);
            // $pro[$a] = $pkg->name;

            // echo $pkg->id;
            for($i=0;$i<count($package);$i++){

            $progress = package_user::where('package_id',$pkg->id)->get();

        }
                echo $progress->count();
               
               
                // die();
            $a++;
        }
        
        print_r($pro);
                die();
    
          
          
         
        //  die();
        return view('user.progress' , compact('progress'))->with('detail',$detail)->with('user',$user)->with('package',$package);;        
       
        }


    
 
    public function store(Request $req, User $user)
    {
        $detail = new Detail;
    
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

        $itemCount = count($packages);
        //dd($itemCount);
        for($i=0; $i<$itemCount; $i++) {
            $packageUser->packages()->attach($packages[$i]);
        }
      
        return redirect('users');
    }

  

}
