<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;

use App\Models\Package;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Course;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('test.index', compact('tests'));
    }
    public function index2()
    {
        $tests = Test::all();
        return view('test.dd', compact('tests'));
    }
    public function index3()
    {
        $tests = Test::all();
        return view('test.ran', compact('tests'));
    }

    public function list()
    {
        return Test::all();
         
    }

    public function create()
    {   
        return $this->edit(new Test());
    }

    public function edit(Test $test)
    {
        $courses = Course::where('active', 1)->get();
        $subjects = Subject::where('active', 1)->get();        
        $packages = Package::where('active', 1)->get();
        return view('test.create', compact('packages','courses','subjects'))->withTest($test);
    }
    // dd
    public function getAllQuestion(Test $test , $id){
        
        // $packages = DB::table('tests')
        // ->where("id",'=',$id)
        // ->join('packages', 'packages.id','=', 'tests.package_id')
        // ->get();
       
        $raj = DB::table('question_test')
        ->where("test_id",'=',$id)
        ->join('questions' , 'question_test.question_id' , '=' , 'questions.id')
        ->join('options' , 'questions.id' , '=' , 'options.question_id')        

        ->get();
        return view('test.ss',compact('raj'));
        

    }

    public function store(TestRequest $request) 
    {
        return $this->update($request, new Test());
    }

    public function update(TestRequest $request, Test $test)
    {
        $test->type = $request->type;
        $test->package_id = $request->package;
        $test->subjectid = $request->subject;
        $test->name = $request->name;
        $test->slug = $request->name;
        $test->summary = $request->summary;
        $test->total_questions = $request->total_questions;
        // $test->preparation_question=$request->preparation_question;
        $test->score = $request->score;
        $test->duration = $request->duration;
        $test->published = $request->published ?? 0;
        
        if($test->save()) {
            return redirect()->back()->with('success', 'Test saved successfully');
        } else {
            return redirect()->back()->with('failure', 'Failed to save test');
        }
    }

    public function test_questions()
    {
        $questions = Question::where('active', 1)->get();
        $subjects = Subject::where('active', 1)->get();
        $tests = Test::where('active', 1)->get();

        return view('test.test_questions', compact('questions', 'subjects', 'tests'));
    }

    public function store_test_questions(Request $request)
    {
        $this->validate($request, [
            'test' => 'required|exists:tests,id',
            'question' => 'required|array',
            "question.*"  => "required|distinct"
        ]);
        
        // Begin Transaction
        DB::beginTransaction();
        try {
            $test = Test::find($request->test);
            $test->questions()->sync($request->question);
            
            // Commit Transaction
            DB::commit();
            return redirect()->back()->with(['success' => 'Test added successfully']);
        } catch(\Exception $e) {
            // Rollback Transaction
            DB::rollback();
            return redirect()->back()->with('failure', 'Failed to add test');
        }
    }
    
    public function update_status(Request $request, $id)
    {
        $test = Test::find($id);
        if($test) {
            $test->active = $request->status;
            if($test->save()) {
                return redirect()->back()->with('success', 'Status updated successfully');
            } else {
                return redirect()->back()->with('failure', 'Failed to update status');
            }
        } else {
            return redirect()->back()->with('failure', 'Some error occured');
        }
    }
    public function randomData(Request $request){
       
        $tests = Test::all();
        $num=$request->numb;
      
        $result =
         Question::where('active', 1)            
        ->orderBy('id', 'desc')
        ->take(900)
        ->get()
        ->random($num);       

    return view('test.randon_question', compact('result','tests'));
    }
}
