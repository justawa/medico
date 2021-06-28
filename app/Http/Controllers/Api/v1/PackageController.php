<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Package;

class PackageController extends Controller
{
    public function show(Request $request, $id)
    {
        $package = Package::find($id);
        if($package) {
            return response()->json([
                'success' => true,
                'package' => $package
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => true,
                'error' => 'package not found'
            ], 404);
        }
    }
}
