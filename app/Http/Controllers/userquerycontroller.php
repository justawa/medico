<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\userquery;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// use App\Models\userquery;

class userquerycontroller extends Controller
{
    public function create()
    {
        return view('chat.userquery');
    }

    public function store(Request $request)
    {   


        $userquery = new Ticket();
        $userquery->ticket_id = rand(100, 10000);
        
        $userquery->user_id = $request->input('user_id');
        $userquery->subject = $request->input('subject');
        $userquery->description = $request->input('description');
        // $userquery->attachment = $request->input('attachement');
        $userquery->active = 1;
        

        
        if($userquery->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Ticket submit successfully.'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => true,
                'error' => 'wrong response'
            ], 404);
        }

    }

    public function show(Request $request, $user_id)
    {
        return Ticket::where('user_id', $user_id)->get();
        // $ticket = Ticket::where('user_id', $user_id)->get();
        // if($ticket) {
        //     return response()->json([
        //         'success' => true,
        //         'ticket' => $ticket
        //     ], Response::HTTP_OK);
        // } else {
        //     return response()->json([
        //         'success' => true,
        //         'error' => 'ticket not found'
        //     ], 404);
        // }
      
    }
}

