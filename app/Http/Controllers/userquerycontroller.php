<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Ticket;
use App\Models\userquery;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// use App\Models\userquery;
=======
use Illuminate\Http\Request;

use App\Models\userquery;
>>>>>>> 1e3b6fe0d20df0167d0391cf14bf3d0f4e42e782

class userquerycontroller extends Controller
{
    public function create()
    {
        return view('chat.userquery');
    }

    public function store(Request $request)
    {   
<<<<<<< HEAD


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

=======
        $userquery = new userquery;
        $userquery->userid = $request->input('userid');
        $userquery->question = $request->input('question');
        $userquery->save();
            return redirect()->back()->with('status','Data Submitted');
    }
}
>>>>>>> 1e3b6fe0d20df0167d0391cf14bf3d0f4e42e782
