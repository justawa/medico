<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class ticketController extends Controller
{
    public function create(Request $req)
    {

        /*$this->validate($req,[
            'author_name' => 'required',
            'author_email' => 'required',
            'title' => 'required',
            'content' => 'required',
            'attachment' => 'required',
            'status' => 'required',
        ]);*/

        $ticket = new Ticket;
        $ticket->name=$req->author_name;
        $ticket->email=$req->author_email;
        $ticket->title=$req->title;
        $ticket->content=$req->content;
        $ticket->attachment=$req->attachment;
        $ticket->status=$req->status;
        $ticket->save();

        return view('Ticket.form');
    }

      public function store(Request $req)
      {
         $ticket = Ticket::get();
         //dd($ticket);
         return view('Ticket.receiveForm',compact('ticket', $ticket));
      }
}
