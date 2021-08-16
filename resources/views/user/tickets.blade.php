@extends('layouts.dashboard')
@section('title', 'DASHBOARD')
@section('content')

<style>

    .topnav {
      overflow: hidden;
      background-color: #333;
    }
    
    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }
    
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }
    
    .topnav a.active {
      background-color: #ddd;
      color: black;
    }

    
    </style>
    <div class="topnav">
        <a href="{{ route('user.index') }}">Dashboard</a>
        <a href="{{ route('user.subscription', $user->id) }}">Subscriptions</a>
        <a href="{{ route('user.progress', $user->id) }}"> Progress </a>
        <a href="{{ route('user.package', $user->id) }}">Package</a>
        <a href="{{ route('user.ebook', $user->id) }}">My Ebooks</a>
        <a href="{{ route('user.report', $user->id) }}">My Reports</a>
        <a  href="{{ route('user.edit', $user->id) }}">My Profile</a>
        <a href="{{ route('user.review', $user->id) }}">Reviews</a>
        <a  class="active" href="#">Student Tickets</a>
      </div>
      <br>
   
    

<section class="content"> 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <div class="card card-primary">
                <div class="card-header">
                <h4 class="card-title"><strong>Tickets</strong></h4>
            </div>

                <div class="card-body">

                    <div class="card-body table-responsive p-0" style="height: 60vh;">
                        <table class="table table-head-fixed text-nowrap">
                    <thead >
                        <tr >
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Subject</th>
                        {{-- <th scope="col">Attachment</th> --}}
                        <th scope="col">Query</th>
                        <th scope="col">Reply</th>
                        <th scope="col">New Reply</th>
                        <th scope="col">All conversation</th>
                        <th scope="col">Case</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($tickets->count() > 0)
                        @foreach($tickets as $ticket)
                        <tr>

                            
                        {{-- <th scope="row">{{ $ticket->id }}</th> --}}
                        <td style="color:green">{{ $ticket->active ? 'Open' : 'Closed'}}</td>
                        <td>{{ $ticket->ticket_id }}</td>
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->subject }}</td>
                        {{-- <td>{{ $ticket->attachment }}</td> --}}
                        <td>{{ $ticket->description }}</td>
                      

                      <td>{{$ticket->reply}}</td>

                      <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#replyTicket">Reply</button></td>
                      <td><a href="{{ route('user.chat', $user->id)}}">View</a></td>
                      <td><a href="{{ route('user.update.status', $ticket->id) }}" class="btn btn-primary btn-sm" 
                        onclick="event.preventDefault();
                        document.getElementById('status-update-form{{ $ticket->id }}').submit();">
                      {{ $ticket->active ? 'Close' : 'Open' }}
                    </a>

                    <form id="status-update-form{{ $ticket->id }}" action="{{ route('user.update.status', $ticket->id) }}" 
                      method="POST" style="display: none;">
                      @csrf
                      @method('PATCH')
                      <input type="hidden" name="status" value="{{ $ticket->active ? 0 : 1 }}" />
                    </form></td>
                        
                    </tr>     
                    <form class="form-group" action="{{ route('user.sendReply', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <div class="modal fade" id="replyTicket" tabindex="-1" role="dialog" aria-labelledby="replyTicketTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Send Reply</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea class="form-control" id="reply" name="reply" placeholder="Type here..." cols="15" rows="6"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>   
                        @endforeach
                        @else
                        <tr>
                        <td colspan="7" style="color: red"><h4><strong>No Data</strong></h4></td>
                        </tr>
                        @endif         
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</section> 
@endsection

