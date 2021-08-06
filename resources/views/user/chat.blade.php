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
    .userbox {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.adminbox {
  border-color: #ccc;
  background-color: #ddd;
}

.userbox::after {
  content: "";
  clear: both;
  display: table;
}
.userbox img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}
.userbox img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}
.time-right {
  float: right;
  color: #aaa;
}
.time-left {
  float: left;
  color: #999;
}
    </style>
    <div class="topnav">
        <a href="{{ route('user.index') }}">Dashboard</a>
        <a href="{{ route('user.subscription', $user->id) }}">Subscriptions</a>
        <a href="{{ route('user.progress', $user->id) }}"> Progress </a>
        <a href="{{ route('user.package', $user->id) }}">Package</a>
        <a href="{{ route('user.ebook', $user->id) }}">My Ebooks</a>
        <a href="{{ route('user.report', $user->id) }}">My Reports</a>
        <a href="{{ route('user.edit', $user->id) }}">My Profile</a>
        <a href="{{ route('user.review', $user->id) }}">Reviews</a>
        <a href="{{ route('user.tickets' ,$user->id )}}">Student Tickets</a>
      </div>
      <br>
<section class="content"> 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <div class="card card-primary">
                <div class="card-header">
                <h4 class="card-title"><strong>Conversation</strong></h4>
            </div>

                <div class="card-body">
                  @if($tickets->count() > 0)
                  @foreach($tickets as $ticket)
                  <tr>

                    <div class="userbox">
                        <img src="/images/a2.png" alt="Avatar" style="width:100%;">
                        <p> <td>{{ $ticket->description }}</td> </p>
                        <span class="time-right">11:02</span>
                      </div>


                    <div class="userbox adminbox">
                        <img src="/images/a1.png" alt="Avatar" class="right" style="width:100%;">
                        <p> <td>{{$ticket->reply}}</td></p>
                        <span class="time-left">11:05</span>
                      </div>
                      @endforeach
                      @else
                      <tr>
                      <td colspan="7" style="color: red"><h4><strong>No Data</strong></h4></td>
                      </tr>
                      @endif  
                </div>
            </div>
        </div>
    </div>
</div>
</section> 
@endsection

