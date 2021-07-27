<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Detail;
use App\Models\Package;
// use App\Models\package_user;
use App\Models\package_user;
use DB;

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
        $users=array();
        $a=0;
        $i=1;

       $progress = package_user::select(DB::raw(' packages.id as package_id, packages.name, COUNT(*) AS user_count'))
                    ->join('packages', 'packages.id', '=', 'package_user.package_id')
                    ->groupBy('package_user.package_id')->get();


                    // for($a=0;$a<4;$a++)
                    // {

                        
                        $users = package_user::select(DB::raw(' users.id as user_id, users.name'))
                        ->join('users', 'users.id', '=', 'package_user.user_id')
                        ->where('package_user.package_id' , 1)
                        ->get();
                        // echo $users;
                        // $i++;
                      
                    // }
    
          
          
         
        //  die();
        return view('user.progress' , compact('progress'))->with('users',$users)->with('package',$package);;        
       
        }

        public function progressshow($id){
            $users = package_user::select(DB::raw(' users.id as user_id, users.name'))
            ->join('users', 'users.id', '=', 'package_user.user_id')
            ->where('package_user.package_id' , $id)
            ->get();
            return view('user.show', compact('users'));
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
