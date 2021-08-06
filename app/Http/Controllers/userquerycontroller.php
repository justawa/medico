<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\userquery;

class userquerycontroller extends Controller
{
    public function create()
    {
        return view('chat.userquery');
    }

    public function store(Request $request)
    {   
        $userquery = new userquery;
        $userquery->userid = $request->input('userid');
        $userquery->question = $request->input('question');
        $userquery->save();
            return redirect()->back()->with('status','Data Submitted');
    }
}
