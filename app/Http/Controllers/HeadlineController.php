<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Headline;

class HeadlineController extends Controller
{
    
    public function create()
    {
       return view('Headline.create');
    }


    public function store(Request $request)
    {
        $Headline = new Headline;
        $Headline->headline = $request->input('headline');
       
        $Headline->save();
        return redirect()->back()->with('status','Headline Added Successfully');
    }

  
    public function show(Headline $Headline)
    {
        $Headline=Headline::all();
        return view('Headline.show' , compact('Headline'));
    }

    public function list()
    {
        return Headline::all();
    }
   
    public function edit($id)
    {
        $Headline = Headline::find($id);
        return view('Headline.edit' , compact('Headline'));
    }

    public function update(Request $request , $id)
    {
        $Headline = Headline::find($id);
        $Headline->headline = $request->input('headline');
        $Headline->update();
        return redirect()->back()->with('status','Headline updated Successfully');
      
       
    }
   
}
