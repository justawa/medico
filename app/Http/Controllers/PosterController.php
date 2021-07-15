<?php

namespace App\Http\Controllers;

use App\Models\poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PosterController extends Controller
{
 
    public function create()
    {
       return view('poster.create');
    }


    public function store(Request $request)
    {
        $poster = new poster;
        $poster->title = $request->input('title');
        $poster->link = $request->input('link');
        $poster->category = $request->input('category');
        $poster->discription = $request->input('discription');
        $poster->status = $request->input('status');
        if($request->hasfile('profile_image'))
        {
            $file= $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/banner/',$filename);
            $poster->profile_image = $filename;

            $poster->save();
            return redirect()->back()->with('status','Image Added Successfully');
        }
    }

  
    public function show(poster $poster)
    {
        $poster=poster::all();
        return view('poster.show' , compact('poster'));
    }

    public function list()
    {
        return poster::all();
    }
   
    public function edit($id)
    {
        $poster = poster::find($id);
        return view('poster.edit' , compact('poster'));
    }

    public function update(Request $request , $id)
    {
        $poster = poster::find($id);
        $poster->title = $request->input('title');
        $poster->link = $request->input('link');
        $poster->category = $request->input('category');
        $poster->discription = $request->input('discription');
        $poster->status = $request->input('status');
        if($request->hasfile('profile_image'))
        {   
            $destination = 'uploads/banner/'.$poster->profile_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file= $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/banner/',$filename);
            $poster->profile_image = $filename;

            $poster->update();
            return redirect()->back()->with('status','Image updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poster = poster::find($id);
        $destination = 'uploads/banner/'.$poster->profile_image;
        if(File::exists($destination)){

            File::delete($destination);
        }
        $poster->delete();
        return redirect()->back()->with('status','Image Deleted Successfully');
    }
}
