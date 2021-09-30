<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question_test;
use App\Models\Question;
use App\Models\Test;

class question_testController extends Controller
{
    public function store(Request $request){
       
       
        $count=$request->input('count');
        
        for($i=0;$i<$count;$i++){                                                                   

            $question_test= new question_test;
            $question_test->test_id = $request->input('test');
            $question_test->question_id = $request->number[$i];    
            $question_test->save();        

        }

        

        return redirect()->back()->with('status','Questions Added Successfully');

    }
   
}
