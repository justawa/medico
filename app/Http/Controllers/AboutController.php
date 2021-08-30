<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{  
    public function create()
    {
       return view('About.create');
    }


    public function store(Request $request)
    {
        $About = new About;
        $About->about = $request->input('about');
       
        $About->save();
        return redirect()->back()->with('status','About Section Added Successfully');
    }

  
    public function show(About $About)
    {
        $About=About::all();
        return view('About.show' , compact('About'));
    }

    public function list()
    {
        return About::all();
    }
   
    public function edit($id)
    {
        $About = About::find($id);
        return view('About.edit' , compact('About'));
    }

    public function update(Request $request , $id)
    {
        $About = About::find($id);
        $About->about = $request->input('about');
        $About->update();
        return redirect()->back()->with('status','About Section updated Successfully');
      
       
    }
   
}

