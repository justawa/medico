<?php

namespace App\Http\Controllers;

use App\Models\poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
   
    public function index()
    {
        return view('poster.index');
    }

  
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(poster $poster)
    {
        $poster=poster::all();
        return view('poster.show' , compact('poster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(poster $poster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poster $poster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(poster $poster)
    {
        //
    }
}
