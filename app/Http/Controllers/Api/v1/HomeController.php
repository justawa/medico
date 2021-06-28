<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Test;

class HomeController extends Controller
{
    public function getGrandTest(Request $request)
    {
        $grand_tests = Test::where('type', 'grand')->get();

        if($grand_tests) {
            return response()->json([
                'success' => true,
                'grand_tests' => $grand_tests
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'grand tests not found'
            ], 404);
        }
    }
}
