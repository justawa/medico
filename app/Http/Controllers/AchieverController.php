<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Achiever;

class AchieverController extends Controller
{
    
        public function create()
        {
           return view('pages/achiever.create');
        }
    
    
        public function store(Request $request)
        {
            $Achiever = new Achiever;
            $Achiever->name = $request->input('name');
            $Achiever->percent = $request->input('percent');
          
            if($request->hasfile('profile_image'))
            {
                $file= $request->file('profile_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('Achiever/',$filename);
                $Achiever->profile_image = $filename;
    
                $Achiever->save();
                return redirect()->back()->with('status','Added Successfully');
            }
        }
    
      
        public function show(Achiever $Achiever)
        {
            $Achiever=Achiever::all();
            return view('pages/achiever.show' , compact('Achiever'));
        }
    
        public function list()
        {
            return Achiever::all();
        }
       
        public function edit($id)
        {
            $Achiever = Achiever::find($id);
            return view('pages/achiever.edit' , compact('Achiever'));
        }
    
        public function update(Request $request , $id)
        {
            $Achiever = Achiever::find($id);
            $Achiever->name = $request->input('name');
            $Achiever->percent = $request->input('percent');
            if($request->hasfile('profile_image'))
            {   
                $destination = 'Achiever/'.$Achiever->profile_image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file= $request->file('profile_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('Achiever/',$filename);
                $Achiever->profile_image = $filename;
    
                $Achiever->update();
                return redirect()->back()->with('status','Updated Successfully');
            }
        }
    
      
        public function destroy($id)
        {
            $Achiever = Achiever::find($id);
            $destination = 'Achiever/'.$Achiever->profile_image;
            if(File::exists($destination)){
    
                File::delete($destination);
            }
            $Achiever->delete();
            return redirect()->back()->with('status','Deleted Successfully');
        }
    
    










}
