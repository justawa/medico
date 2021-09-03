@extends('layouts.dashboard')
@section('title', 'Support Tickets')
@section('content')
<!-- <style>
.needsclick{
    width:410px;
    height:150px;
    border:1px solid lightgray;
}
</style>
<section class="content"> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card">
                <div class="card-header">Add ticket</div>

                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="author_name" class="col-md-4 col-form-label text-md-right">Your Name</label>

                            <div class="col-md-6">
                                <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="" required autocomplete="name" autofocus>

                                @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_email" class="col-md-4 col-form-label text-md-right">Your Email</label>

                            <div class="col-md-6">
                                <input id="author_email" type="email" class="form-control @error('author_email') is-invalid @enderror" name="author_email" value="" required autocomplete="email">

                                @error('author_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required></textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="attachments" class="col-md-4 col-form-label text-md-right">Attachments</label>

                            <div class="col-md-6">
                                
                                <input type="file"  name="attachment">
                
                                
                            </div>
                            @error('attachment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">status</label>

                        <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="status" value="" required autocomplete="status">

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                          </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->
<section class="content"> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">Tickets</div>

                <div class="card-body">

                    <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Attachment</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ation</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($tickets->count() > 0)
                        @foreach($tickets as $ticket)
                        <tr>
                        <th scope="row">{{ $ticket->id }}</th>
                        <td>{{ $ticket->ticket_id }}</td>
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->attachment }}</td>
                        <td>{{ $ticket->active ? 'Active' : 'Not Active'}}</td>
                        <td><a href="{{ route('ticket.update.status', $ticket->id) }}" class="btn btn-default btn-sm" 
                          onclick="event.preventDefault();
                          document.getElementById('status-update-form{{ $ticket->id }}').submit();">
                        {{ $ticket->active ? 'Deactivate' : 'Activate' }}
                      </a>
                      <form id="status-update-form{{ $ticket->id }}" action="{{ route('ticket.update.status', $ticket->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $ticket->active ? 0 : 1 }}" />
                      </form></td>
                      <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#replyTicket">Reply</button></td>
                        </tr> 
                        @endforeach
                        @else
                        <tr>
                        <td colspan="7">No Data</td>
                        </tr>
                        @endif                  
                    </tbody>
                    </table>
                    <form class="form-group" action="{{ route('ticket.sendReply', $ticket->id) }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>
</div>
</section> 
@endsection

@section('scripts')
  <script>
    $(document).ready( function () {
      $('#dataTable').DataTable({
        "paging":   false,
        "ordering": false,
        "scrollCollapse": true,
        "info":     false
      });
        });
  </script>
@endsection