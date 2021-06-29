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

    public function create()
    {
        // return view('question.create', compact('subjects'));
        return $this->edit(new Question());
    }

    public function edit(Question $question)
    {
        $subjects = Subject::where('active', 1)->get();
        return view('question.create', compact('subjects'))->withQuestion($question);
    }

    public function store(QuestionRequest $request)
    {       
        return $this->update($request, new Question());
    }

    public function update(QuestionRequest $request, Question $question)
    {
        // Begin Transaction
        DB::beginTransaction();
        try {
            $question->content = $request->question;
            $question->level = $request->level;
            $question->score = $request->score;
            $question->subject_id = $request->subject;

            if($question->save()) {
                $options = $request->option;
                for($i=0; $i<count($options); $i++) {
                    // $option = new Option;
                    // $option->content = $options[$i];
                    // $option->correct = $request->correct == $i ? 1 : 0;
                    // $option->description = $request->correct == $i ? $request->explanation : null;
                    // $option->question_id = $question->id;

                    // $option->save();

                    Option::updateOrCreate(
                        ['question_id' =>  $question->id],
                        [
                            'content' => $options[$i],
                            'correct' => $request->correct == $i ? 1 : 0,
                            'description' => $request->correct == $i ? $request->explanation : null
                        ]
                    );
                }
                
            }
            // Commit Transaction
            DB::commit();
            return redirect()->back()->with('success', 'Question saved successfully');
        } catch(\Exception $e) {
            // Rollback Transaction
            DB::rollback();
            return redirect()->back()->with('failure', 'Failed to save question');
        }
    }

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