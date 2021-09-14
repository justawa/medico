<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

use App\Models\Option;
use App\Models\Question;
use App\Models\Subject;

class QuestionController extends Controller
{
    public function index()
    {   
        
        $questions = Question::all();
        return view('question.index', compact('questions'));
    }

    public function create(Question $question, Option $option)
    {   
       // $questions = Question::all();
        $subjects = Subject::where('active', 1)->get();
        return view('question.create', compact('subjects','question','option'));
       // return $this->edit(new Question());
    }

    public function creat(Question $question, Option $option)
    {   
       
        $subjects = Subject::where('active', 1)->get();
        return view('question.imagetype', compact('subjects','question','option'));
       
    }


    public function edit(Question $question)
    {   
        $question_id = $question->id;
      
      // $option = Option::first();
       $option = Option::where('question_id', $question_id)->first();
        
        $subjects = Subject::where('active', 1)->get();
        return view('question.create', compact('subjects','option'))->withQuestion($question);
    }

    public function store(QuestionRequest $request, Question $question, Option $option)
    {    
        $question->content = $request->question_name;
        $question->level = $request->level;
        $question->score = $request->score;
        $question->subject_id = $request->subject;
       
        if($question->save())
        {
            $option->option1 = $request->option1;
            $option->option2 = $request->option2;
            $option->option3 = $request->option3;
            $option->option4 = $request->option4;
            $option->description = $request->explanation;
            $option->correct = $request->correct;
            $option->question_id = $question->id; 

            $option->save();
        }
        return redirect()->back()->with('success', 'Added Successfully.');
    }


    public function imgstor(QuestionRequest $request, Question $question, Option $option)
    {                   
        $question->subject_id = $request->subject;
        $question->level = $request->level;
        $question->score = $request->score;

        if($request->hasfile('question_image'))
        {
            $file= $request->file('question_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('question/',$filename);
            $question->question_image = $filename;
            // $question->save();
        }

        if($question->save())
        {
          
            $option->description = $request->input('explanation');
            $option->correct = $request->input('correct');
            $option->question_id = $question->id; 

            if($request->hasfile('option1_image'))
        {
            $file= $request->file('option1_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Option/',$filename);
            $option->option1_image = $filename;
        
        }     
        if($request->hasfile('option2_image'))
        {
            $file= $request->file('option2_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Option/',$filename);
            $option->option2_image = $filename;
        
        }     
        if($request->hasfile('option3_image'))
        {
            $file= $request->file('option3_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Option/',$filename);
            $option->option3_image = $filename;
        
        }     
        if($request->hasfile('option4_image'))
        {
            $file= $request->file('option4_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Option/',$filename);
            $option->option4_image = $filename;
        
        }                   
            $option->save();
        }
        return redirect()->back()->with('success', 'Added Successfully.');
    }






    public function update(QuestionRequest $request, Question $question, Option $option)
    {

        // dd($option);
        

        $question->content = $request->question_name;
        $question->level = $request->level;
        $question->score = $request->score;
        $question->subject_id = $request->subject;
        
        if($question->save())
        {
            $option = Option::find($question);
            $option = Option::where('question_id',$question->id)->first();
            $option->option1 = $request->option1;
            $option->option2 = $request->option2;
            $option->option3 = $request->option3;
            $option->option4 = $request->option4;
            $option->description = $request->explanation;
            $option->correct = $request->correct;
            $option->question_id = $question->id; 

            $option->save();
        }
     
         
        
        
        
        
        // $option = Option::updateOrCreate(
        //     [ $option->option1 = $request->option1,
        //     $option->option2 = $request->option2,
        //     $option->option3 = $request->option3,
        //     $option->option4 = $request->option4,
        //     $option->description = $request->explanation,
        //     $option->correct = $request->correct,
        //    // $option->question_id = $question->id
        // ],
        //     ['question_id' => $question->id]
        // ); 


        
        return redirect()->back()->with('success', 'Updated Successfully.');
        

   }


    // public function update(QuestionRequest $request, Question $question)
    // {
    //     // Begin Transaction
    //     DB::beginTransaction();
    //     try {
    //         $question->content = $request->question;
    //         $question->level = $request->level;
    //         $question->score = $request->score;
    //         $question->subject_id = $request->subject;

    //         if($question->save()) {
    //             $options = $request->option;
    //             for($i=0; $i<=count($options); $i++) {
    //                 // $option = new Option;
    //                 // $option->content = $options[$i];
    //                 // $option->correct = $request->correct == $i ? 1 : 0;
    //                 // $option->description = $request->correct == $i ? $request->explanation : null;
    //                 // $option->question_id = $question->id;

    //                 // $option->save();

    //                 Option::updateOrCreate(
    //                     ['question_id' =>  $question->id],
    //                     [
    //                         'content' => $options[$i],
    //                         'correct' => $request->correct == $i ? 1 : 0,
    //                         'description' => $request->correct == $i ? $request->explanation : null
    //                     ]
    //                 );
    //             }
                
    //         }
    //         // Commit Transaction
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Question saved successfully');
    //     }
    //     catch(\Exception $e) {
    //         // Rollback Transaction
    //         DB::rollback();
    //         return redirect()->back()->with('failure', 'Failed to save question');
    //     }
    // }

    public function update_status(Request $request, $id)
    {
        $question = Question::find($id);
        if($question) {
            $question->active = $request->status;
            if($question->save()) {
                return redirect()->back()->with('success', 'Status updated successfully');
            } else {
                return redirect()->back()->with('failure', 'Failed to update status');
            }
        } else {
            return redirect()->back()->with('failure', 'Some error occured');
        }
    }


    // apis
    public function subject_wise_questions(Request $request)
    {
        try{

            $q = Question::where('active', 1);

            if($request->has('subjects')) {
                $q = $q->whereIn('subject_id', $request->subjects);
            }

            $questions = $q->get();
    
            if($questions) {
                return response()->json(['success' => true, 'questions' => $questions]);
            } else {
                return response()->json(['success' => false, 'questions' => []]);
            }
        } catch(\Exception $e) {
            return response()->json(['success' => false, 'questions' => []]);
        }
    }

   
}