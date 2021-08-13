@extends('layouts.dashboard')
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
    <a class="active" href="{{ route('user.progress', $user->id) }}"> Progress </a>
    <a href="{{ route('user.package', $user->id) }}">Package</a>
    <a href="{{ route('user.ebook', $user->id) }}">My Ebooks</a>
    <a href="{{ route('user.report', $user->id) }}">My Reports</a>
    <a href="{{ route('user.edit', $user->id) }}">My Profile</a>
    <a href="{{ route('user.review', $user->id) }}">Reviews</a>
    <a href="{{ route('user.tickets' ,$user->id ) }}">Student Tickets</a>
  </div>
  <br>
  


<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class = row>
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
        <h4 class="card-title"><strong>Progress</strong></h4>
    </div>
       
      <div class="card-body table-responsive p-0" style="height: 60vh;">

        <table id="dataTable" class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Package</th>
            <th scope="col">No. of User</th>
            <th scope="col">All User</th>

            </tr>
        </thead>
          <tbody>
            @foreach($progress as $progres)
            <tr>
              <td>  <a href="">{{ $progres->package_id }}</a>  </td>
               <td>  <a href="">{{ $progres->name }}</a>  </td>
               <td> {{ $progres->user_count }} </td>
               <td><a href="{{ route('user.show',$progres->package_id)}}"> Show </a></td>
              </tr>
                @endforeach
          </tbody>
          </table>             
</div> 
</div>
</div>
</div>
</div>		   
</section>
@endsection