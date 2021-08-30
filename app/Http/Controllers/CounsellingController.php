<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Counselling;

class CounsellingController extends Controller
{
        
            public function create()
            {
               return view('pages/counselling.create');
            }
        
        
            public function store(Request $request)
            {
                $Counselling = new Counselling;
                $Counselling->name = $request->input('name');
                $Counselling->specilization = $request->input('specilization');
                $Counselling->place = $request->input('place');

              
                if($request->hasfile('profile_image'))
                {
                    $file= $request->file('profile_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('Counselling/',$filename);
                    $Counselling->profile_image = $filename;
        
                    $Counselling->save();
                    return redirect()->back()->with('status','Added Successfully');
                }
            }
        
          
            public function show(Counselling $Counselling)
            {
                $Counselling=Counselling::all();
                return view('pages/counselling.show' , compact('Counselling'));
            }
        
            public function list()
            {
                return Counselling::all();
            }
           
            public function edit($id)
            {
                $Counselling = Counselling::find($id);
                return view('pages/counselling.edit' , compact('Counselling'));
            }
        
            public function update(Request $request , $id)
            {
                $Counselling = Counselling::find($id);
                $Counselling->name = $request->input('name');
                $Counselling->specilization = $request->input('specilization');
                $Counselling->place = $request->input('place');
                if($request->hasfile('profile_image'))
                {   
                    $destination = 'Counselling/'.$Counselling->profile_image;
                    if(File::exists($destination)){
                        File::delete($destination);
                    }
                    $file= $request->file('profile_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('Counselling/',$filename);
                    $Counselling->profile_image = $filename;
        
                    $Counselling->update();
                    return redirect()->back()->with('status','Updated Successfully');
                }
            }
        
          
            public function destroy($id)
            {
                $Counselling = Counselling::find($id);
                $destination = 'Counselling/'.$Counselling->profile_image;
                if(File::exists($destination)){
        
                    File::delete($destination);
                }
                $Counselling->delete();
                return redirect()->back()->with('status','Deleted Successfully');
            }
        
        
    
    
    
    
    
    
    
    
    
    
    
    



}
