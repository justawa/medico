<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    
    public function create()
    {
       return view('pages/notice.create');
    }


    public function store(Request $request)
    {
        $Notice = new Notice;
        $Notice->notice = $request->input('notice');
        $Notice->tag = $request->input('tag');
        $Notice->save();
        return redirect()->back()->with('status','Added Successfully');
    }

  
    public function show(Notice $Notice)
    {
        $Notice=Notice::all();
        return view('pages/notice.show' , compact('Notice'));
    }

    public function list()
    {
        return Notice::all();
    }
   
    public function edit($id)
    {
        $Notice = Notice::find($id);
        return view('pages/notice.edit' , compact('Notice'));
    }

    public function update(Request $request , $id)
    {
        $Notice = Notice::find($id);
        $Notice->notice = $request->input('notice');
        $Notice->tag = $request->input('tag');
        $Notice->update();
        return redirect()->back()->with('status','Updated Successfully');
        
    }

  
    public function destroy($id)
    {
        $Notice = Notice::find($id);
        $Notice->delete();
        return redirect()->back()->with('status','Deleted Successfully');
    }
}
