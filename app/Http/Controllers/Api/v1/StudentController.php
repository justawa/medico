<?php

namespace App\Http\Controllers\Api\v1;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Attempt;
use App\Models\AttemptDetail;
use App\Models\Option;
use App\Models\Package;
use App\Models\Question;
use App\Models\Test;
use App\Models\User;

class StudentController extends Controller
{
    public function buyPackage(Request $request)
    {

        // return $request->items;
        // Begin Transaction
        DB::beginTransaction();
        try {
            $items = json_decode($request->items);
            // $items = $request->items;
            $itemCount = count($items);
    
            for($i=0; $i<$itemCount; $i++) {
                $request->user->packages()->attach($items[$i]->id);
            }
    
            // Commit Transaction
            DB::commit();
            return response()->json([
                'success' => true,
            ], Response::HTTP_OK);
        } catch(\Exception $e) {
            // Rollback Transaction
            DB::rollback();
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getPackages(Request $request, $id)
    {
        $packages = User::find($id)->packages;
        return response()->json([
            'success' => true,
            'packages' => $packages
        ], Response::HTTP_OK);
    }

    public function getPackageTests(Request $request, $id)
    {
        // check for tests if they are published or not
        $tests = Package::find($id)->tests;

        foreach($tests as $test) {
            $attempt = Attempt::where(['user_id' => $request->user->id, 'test_id' => $test->id])->first();
            $test->status = $attempt->status ?? 'started';
        }
        return response()->json([
            'success' => true,
            'tests' => $tests
        ], Response::HTTP_OK);
    }


    public function createAttempt(Request $request, $test_id)
    {
        $attempt = Attempt::where('user_id', $request->user->id)
                            ->where('test_id', $test_id)
                            ->first();
        if(!$attempt) {
            $attempt = new Attempt;
            $attempt->score = 0;
            $attempt->user_id = $request->user->id;
            $attempt->test_id = $test_id;
        }
        $attempt->status = 'started';

        if($attempt->save()) {
            $questions = $this->getTestQuestions($request, $test_id);

            $details = AttemptDetail::where('attempt_id', $attempt->id)->get();

            $currentQuestion = count($details) > 0 ? count($details) : '';

            return response()->json([
                'success' => true,
                'questions' => $questions,
                'attempt' => $attempt,
                'currentQuestion' => $currentQuestion,
                'attemptDetails' => $details
            ], Response::HTTP_OK);
        } else {
            response()->json([
                'success' => false,
                'error' => 'failed to create test attempt'
            ], 500);
        }
    }

    private function getTestQuestions(Request $request, $id)
    {
        $test = Test::findOrFail($id);
        
        $limit = $test->total_questions ?? 5;
        $questions = $test->questions()->take($limit)->get();

        return $questions;
    }

    public function getQuestionById(Request $request, $id)
    {
        $question = $this->questionById($id);
        return response()->json([
            'success' => true,
            'question' => $question
        ], Response::HTTP_OK);
    }

    private function questionById($id)
    {
        $question = Question::find($id);
        // $question->load('options');

        return $question;
    }

    public function storeAttemptDetails(Request $request)
    {
        // find the actual correct option
        $correct_option = Option::where(['question_id' => $request->question_id, 'correct' => 1])->first();
        // find if detail alread exist
        $detail = AttemptDetail::where(['attempt_id' => $request->attempt_id, 'question_id' => $request->question_id])->first();

        if(!$detail) {
            $detail = new AttemptDetail;
            $detail->attempt_id = $request->attempt_id;
            $detail->question_id = $request->question_id;
        }
        $detail->mode = 'attempt';
        $detail->option_id = $request->option_id;
        $detail->is_correct = $correct_option->id === $request->option_id ? 1 : 0;

        $correct_option->load('question');
    
        if($detail->save()) {

            // $question = questionById($detail->question_id);
            $attempt_details = AttemptDetail::where(['attempt_id' => $request->attempt_id])->get();
            
            return response()->json([
                'success' => true,
                'correct' => $correct_option,
                'attemptDetails' => $attempt_details
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'failed to save details'
            ], 500);
        }
    }

    public function detailSolution(Request $request)
    {
        // find the actual correct option
        $correct_option = Option::where(['question_id' => $request->question_id, 'correct' => 1])->first();
        // find if detail alread exist
        $detail = AttemptDetail::where(['attempt_id' => $request->attempt_id, 'question_id' => $request->question_id])->first();

        if($detail && $detail->mode == 'attempt') {
            $correct_option->load('question');
        } else {
            $correct_option = [];
        }

        $attempt_details = AttemptDetail::where(['attempt_id' => $request->attempt_id])->get();
        return response()->json([
            'success' => true,
            'correct' => $correct_option,
            'attemptDetails' => $attempt_details
        ], Response::HTTP_OK);
    }

    public function updateAttempt(Request $request, $id)
    {
        $attempt = Attempt::findOrFail($id);
        $test = Test::find($attempt->test_id);
        $attempt->status = $test->type === 'preparation' ? 'paused' : 'finished';

        if($attempt->save()) {
            return response()->json([
                'success' => true,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'failed to update status'
            ], 500);
        }
    }

    public function bookmarkAttemptDetails(Request $request)
    {
        $detail = new AttemptDetail;
        $detail->attempt_id = $request->attempt_id;
        $detail->question_id = $request->question_id;
        $detail->mode = 'bookmark';

        if($detail->save()) {
            $attempt_details = AttemptDetail::where(['attempt_id' => $request->attempt_id])->get();
            return response()->json([
                'success' => true,
                'attemptDetails' => $attempt_details
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'failed to bookmark'
            ], 500);
        }
    }

    public function testResult(Request $request, $id)
    {
        $attempted = 0;
        $not_attempted = 0;
        $correct = 0;
        $incorrect = 0;
        $test = Test::find($id);
        $attempt = Attempt::where(['test_id' => $id, 'user_id' => $request->user->id])->first();
        $details = AttemptDetail::where(['attempt_id' => $attempt->id])->get();
        foreach($details as $detail) {
            // $question = Question::find($detail->question_id);
            // $question->load('options');
            // $detail->question = $question;

            if($detail->mode == 'attempt') {
                $option = Option::find($detail->option_id);
                $attempted++;

                if($option->correct == 1) {
                    $correct++;
                }
    
                if($option->correct == 0) {
                    $incorrect++;
                }
            }
        }

        $not_attempted = $test->total_questions - $attempted;
        return response()->json([
            'success' => true,
            'result' => ['total' => $test->total_questions, 'attempt' => $attempted, 'not_attempt' => $not_attempted, 'correct' => $correct, 'incorrect' => $incorrect]
        ], Response::HTTP_OK);
    }
}
