<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Detail;
use App\Models\Package;
use App\Models\package_user;
use App\Models\packageUser;
use App\Models\Ticket;

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
        // dd($user);
        // die();
        $package = Package::get();
      
        $progress=array();
        $users=array();
        $a=0;
        $i=1;

       $progress = package_user::select(DB::raw(' packages.id as package_id, packages.name, COUNT(*) AS user_count'))
                    ->join('packages', 'packages.id', '=', 'package_user.package_id')
                    ->groupBy('package_user.package_id')->get();
          
         
        //  die();
        return view('user.progress' , compact('progress'))->with('user',$user)->with('package',$package);;        
       
        }

        public function progressshow($id){
            $users = package_user::select(DB::raw(' users.id as user_id, users.name'))
            ->join('users', 'users.id', '=', 'package_user.user_id')
            ->where('package_user.package_id' , $id)
            ->get();
            return view('user.show', compact('users'));
        }
        public function ebook(User $user){

            return view('user.ebook', )->with('user', $user);


        }

        public function subscription(User $user){

            $sub = DB::table('package_user')->where('user_id', $user->id)->get();

            return view('user.subscription',compact('sub') )->with('user', $user);


        }
        public function report(User $user){

            return view('user.report', )->with('user', $user);


        }
        
        public function review(User $user){

            return view('user.review', )->with('user', $user);


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
    
            $itemCount = count($packages);
            //dd($itemCount);
            for($i=0; $i<$itemCount; $i++) {
                $packageUser->packages()->attach($packages[$i]);
            }
        
            return redirect('users');
        }

        public function package(Package $package, User $user)
        {
            $pkg_id = $package->id ;
            // $user = User::where('id', $id)->get();
            
            $pkg_users = packageUser::select(Package::raw('package_users.id as pkg_users_id, packages.id as package_id, packages.name as package_name, package_users.active'))
            ->join('packages', 'packages.id', '=', 'package_users.package_id')
            ->where('package_users.user_id', $user->id)
            ->groupBy('package_users.package_id')->get();
            
            // dd($user);
            // die();
            return view('user.package', compact('user','pkg_users'));
        }
    

        public function update_status(Request $request,$id)
        {
            packageUser::where('id',$id)->update(array('active' => $request->status));
            
            return redirect()->back()->with('success', 'Status updated successfully');  
                
        }


        public function ticket(Ticket $ticket, User $user)
        {
            $tickets = Ticket::where('user_id', $user->id )->with('user')->get();
            // $id = $user->id;
            // $user = User::where('id', $id)->first();
            // dd($tickets);
            
            return view('user.tickets', compact('tickets'))->with('user', $user);
        }
        
       
        public function sendReply(Request $request, $id)
    { 
        $ticket = Ticket::find($id);
        
       
        $ticket->reply = $request->reply;
      
           
            $ticket->save();
            return redirect()->back()->with('success', 'Reply send successfully');
        
    }

    public function ticket_status(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if($ticket) {
            $ticket->active = $request->status;
            if($ticket->save()) {
                return redirect()->back()->with('success', 'Status updated successfully');
            } else {
                return redirect()->back()->with('failure', 'Failed to update status');
            }
        } else {
            return redirect()->back()->with('failure', 'Some error occured');
        }
    }

}
